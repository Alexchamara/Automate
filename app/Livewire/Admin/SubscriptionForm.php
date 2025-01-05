<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Plans;
use Stripe\Stripe;

class SubscriptionForm extends Component
{
    public $name;
    public $description;
    public $price;
    public $currency = 'lkr';
    public $billing_period;
    public $is_recurring = true;
    public $price_description;
    public $is_active = true; // Add this property
    public $planItems = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'currency' => 'required|string',
        'billing_period' => 'required_if:is_recurring,true',
        'is_recurring' => 'boolean',
        'price_description' => 'nullable|string',
        'is_active' => 'boolean', // Add validation rule
        'planItems.*.feature' => 'required|string'
    ];

    public function mount()
    {
        $this->addPlanItem();
    }

    public function addPlanItem()
    {
        $this->planItems[] = ['feature' => ''];
    }

    public function removePlanItem($index)
    {
        unset($this->planItems[$index]);
        $this->planItems = array_values($this->planItems);
    }

    public function submit()
    {
        $this->validate();

        Stripe::setApiKey(config('services.stripe.secret'));

        $stripeProduct = \Stripe\Product::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $priceData = [
            'product' => $stripeProduct->id,
            'unit_amount' => $this->price * 100,
            'currency' => $this->currency,
        ];

        if ($this->is_recurring) {
            $priceData['recurring'] = [
                'interval' => $this->billing_period,
            ];
        }

        $stripePrice = \Stripe\Price::create($priceData);

        $plan = Plans::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'currency' => $this->currency,
            'billing_period' => $this->is_recurring ? $this->billing_period : null,
            'is_recurring' => $this->is_recurring,
            'price_description' => $this->price_description,
            'stripe_product_id' => $stripeProduct->id,
        ]);

        foreach ($this->planItems as $item) {
            $plan->planItems()->create([
                'feature' => $this->price_description ?? "Price: {$this->currency} {$this->price}",
                'price_name' => $this->name,
                'stripe_price_id' => $stripePrice->id,
                'price' => $this->price,
                'is_recurring' => $this->is_recurring,
                'billing_period' => $this->is_recurring ? $this->billing_period : null,
                'is_active' => $this->is_active
            ]);
        }

        session()->flash('message', 'Plan created successfully!');
        $this->reset([
            'name',
            'description',
            'price',
            'currency',
            'billing_period',
            'is_recurring',
            'price_description',
            'is_active',
            'planItems'
        ]);
        $this->addPlanItem();
    }

    public function render()
    {
        return view('livewire.admin.subscription-form');
    }
}
