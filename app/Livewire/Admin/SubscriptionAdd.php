<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Stripe\Stripe;
use App\Models\Plans;

class SubscriptionAdd extends Component
{
    public $existingPlanId;
    public $planId;
    public $price_name;
    public $price;
    public $currency = 'lkr';
    public $is_recurring = true;
    public $billing_period = 'monthly';
    public $price_description;
    public $is_active = true;

    protected $rules = [
        'price' => 'required|numeric|min:0',
        'price_name' => 'required|string|max:255',
        'currency' => 'required|string',
        'billing_period' => 'required_if:is_recurring,true',
        'price_description' => 'nullable|string',
        'is_recurring' => 'boolean',
        'is_active' => 'boolean'
    ];

    public function mount($planId = null)
    {
        $this->existingPlanId = $planId;
        if (!$planId) {
            $defaultPlan = Plans::first();
            $this->existingPlanId = $defaultPlan ? $defaultPlan->id : null;
        }
    }

    public function attachNewPrice()
    {
        $this->validate();

        try {
            $plan = Plans::findOrFail($this->existingPlanId);

            Stripe::setApiKey(config('services.stripe.secret'));

            $priceData = [
                'product' => $plan->stripe_product_id,
                'unit_amount' => (int)($this->price * 100),
                'currency' => $this->currency,
                'nickname' => $this->price_name,
            ];

            if ($this->is_recurring) {
                $priceData['recurring'] = [
                    'interval' => $this->billing_period,
                ];
            }

            $stripePrice = \Stripe\Price::create($priceData);

            // Create new plan item with new price
            $planItem = $plan->planItems()->create([
                'feature' => $this->price_description ?? "Price: {$this->currency} {$this->price}",
                'price_name' => $this->price_name,
                'stripe_price_id' => $stripePrice->id,
                'price' => $this->price,
                'is_recurring' => $this->is_recurring,
                'billing_period' => $this->is_recurring ? $this->billing_period : null,
                'is_active' => $this->is_active
            ]);
            if ($planItem) {
                session()->flash('message', 'New price added successfully!');
                
                // Reset form fields
                $this->reset([
                    'price', 
                    'price_name', 
                    'price_description',
                    'billing_period',
                    'is_recurring',
                    'stripe_price_id'
                ]);                
                // Dispatch refresh event to parent
                $this->dispatch('priceAdded')->to('admin-dashboard.subscription-tab');
            } else {
                throw new \Exception('Failed to create plan item');
            }

        } catch (\Exception $e) {
            session()->flash('error', 'Error adding price: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.subscription-add');
    }
}