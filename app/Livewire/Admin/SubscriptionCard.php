<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Plans;

class SubscriptionCard extends Component
{
    public $showModal = false;
    public $selectedPlanId = null;

    // Update listener to use new syntax
    protected $listeners = ['openAddPrice'];

    public function openAddPrice($planId)
    {
        $this->selectedPlanId = $planId;
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.admin.subscription-card', [
            'plans' => Plans::with('planItems')->get()
        ]);
    }
}