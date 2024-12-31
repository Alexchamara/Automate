<?php

namespace App\Livewire\AdminDashboard;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Models\User;
use Livewire\WithPagination;

class UserTab extends Component
{
    use WithPagination;

    #[Url(as: 'u')]
    public $search = ''; // The search input
    public $role = 'all'; // The role filter


    public function render()
    {
        $query = User::query();
        // $users = User::paginate(3);

        if ($this->role !== 'all') {
            $query->where('role', $this->role);
        }

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(3);

        return view('livewire.admin-dashboard.user-tab', compact('users'));
    }
}