<?php

namespace App\Livewire\AdminDashboard;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Models\User;

class UserTab extends Component
{
    #[Url(as: 'u')]
    public $search = ''; // The search input

    public function render()
    {
        $users = User::all();
        // Query users based on the search input
        $users = User::latest()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->get();

        // Pass the users to the view
        return view('livewire.admin-dashboard.user-tab' , [
            'users' => $users,
        ]);
    }
}