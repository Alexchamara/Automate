<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SavedAdvert extends Component
{
    public function removeFavorite($listingId)
    {
        Auth::user()->favorites()->where('listing_id', $listingId)->delete();
        $this->dispatch('favoriteRemoved');
    }

    public function render()
    {
        $savedAdverts = Auth::user()->favorites()
            ->with(['listing.advert'])
            ->latest()
            ->get();

        return view('livewire.user.saved-advert', [
            'savedAdverts' => $savedAdverts
        ]);
    }
}