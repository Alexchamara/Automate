<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class UserCard extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }

    // Deactivate account
    public function deactivateAccount()
    {
        $this->user->update(['isActive' => false]);
        $this->user = $this->user->fresh(); 
        session()->flash('message', 'Account deactivated successfully.');
    }

    // Activate account
    public function activateAccount()
    {
        $this->user->update(['isActive' => true]);
        $this->user = $this->user->fresh();
        session()->flash('message', 'Account activated successfully.');
    }


    public function render()
    {
        return view('livewire.admin.user-card');
    }
}
