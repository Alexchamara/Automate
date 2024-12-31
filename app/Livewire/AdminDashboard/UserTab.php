<?php

namespace App\Livewire\AdminDashboard;

use Livewire\Component;
use App\Models\User;

class UserTab extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }
    
    public function render()
    {
        $users = User::all();
        return view('livewire.admin-dashboard.user-tab', compact('users'));
    }
}
