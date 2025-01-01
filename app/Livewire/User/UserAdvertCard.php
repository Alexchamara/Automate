<?php

namespace App\Livewire\User;

use Livewire\Component;

class UserAdvertCard extends Component
{
    public $listing;
    public $status;
    public $isActive;

    // Mount the listing
    public function mount($listing)
    {
        $this->listing = $listing;
        $this->status = $listing->status;
        $this->isActive = $listing->isActive;
    }

    // Toggle status the listing
    public function toggleActiveStatus()
    {
        $this->listing->update([
            'isActive' => !$this->isActive
        ]);
        $this->isActive = !$this->isActive;

        session()->flash('message', 'Listing ' . ($this->isActive ? 'activated' : 'deactivated') . ' successfully.');
    }

    public function render()
    {
        return view('livewire.user.user-advert-card', [
            'listing' => $this->listing,
            'status' => $this->status,
            'isActive' => $this->isActive
        ]);
    }
}