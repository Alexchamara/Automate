<?php

namespace App\Livewire\AdminDashboard;

use Livewire\Component;
use App\Models\Plans;

class SubscriptionTab extends Component
{
    public $activeTab = 'tab1';
    public $defaultPlan;

    public function mount()
    {
        $this->defaultPlan = Plans::first();
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.admin-dashboard.subscription-tab', [
            'defaultPlan' => $this->defaultPlan
        ]);
    }
}
