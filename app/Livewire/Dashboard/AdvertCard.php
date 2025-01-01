<?php

namespace App\Livewire\Dashboard;

use App\Models\Listing;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class AdvertCard extends Component
{
    use WithPagination;

    public $search = '';
    public $role = 'all';

    // Reset pagination when filters change
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Listing::with(['advert', 'user']);

        // If user is logged in and is a regular user, filter listings
        if (Auth::check() && Auth::user()->role === 'user') {
            $query->where('user_id', Auth::id());
        }

        // Apply status filter
        if ($this->role !== 'all') {
            $query->where('status', $this->role);
        }

        // Apply search filter
        if (!empty($this->search)) {
            $query->whereHas('advert', function ($q) {
                $q->where('make', 'like', '%' . $this->search . '%')
                    ->orWhere('model', 'like', '%' . $this->search . '%')
                    ->orWhere('location', 'like', '%' . $this->search . '%');
            });
        }

        $listings = $query->orderByRaw("CASE 
        WHEN status = 'pendding' THEN 1
        WHEN status = 'approved' THEN 2
        WHEN status = 'rejected' THEN 3
        WHEN status = 'active' THEN 4
        WHEN status = 'deactive' THEN 5
        ELSE 6 
    END")
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        return view('livewire.dashboard.advert-card', compact('listings'));
    }
}
