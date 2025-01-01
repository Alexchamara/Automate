<?php

namespace App\Livewire\Dashboard;

use App\Models\Listing;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class AdvertCard extends Component
{
    use WithPagination;

    public function render()
    {
        $query = Listing::with(['advert', 'user']);
        
        // If user is logged in and is a regular user, filter listings
        if(Auth::check() && Auth::user()->role === 'user') {
            $query->where('user_id', Auth::id());
        }

        $listings = $query->orderByRaw("CASE 
            WHEN status = 'pending' THEN 1
            WHEN status = 'approved' THEN 2
            WHEN status = 'rejected' THEN 3
            ELSE 4 
        END")
        ->paginate(3);

        return view('livewire.dashboard.advert-card', compact('listings'));
    }
}
