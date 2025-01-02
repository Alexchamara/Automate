<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Listing;

class AdminAdvertCard extends Component
{
    public $listing;
    public $status;
    public $isActive;

    // Mount the listing
    public function mount(Listing $listing)
    {
        $this->listing = $listing;
        $this->status = $listing->status;
        $this->isActive = $listing->isActive;
    }

    // Accept the listing
    public function accept()
    {
        $this->listing->update([
            'status' => 'approved',
            'status_updated_at' => now(),
            'isActive' => true,
            'expiration_date' => now()->addDays(3)
        ]);
        $this->status = 'approved';

        session()->flash('message', 'Listing approved successfully.');
    }

    // Reject the listing
    public function reject()
    {
        $this->listing->update([
            'status' => 'rejected',
            'status_updated_at' => now()
        ]);
        $this->status = 'rejected';

        session()->flash('message', 'Listing rejected successfully.');
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
        return view('livewire.admin.admin-advert-card');
    }
}
