<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProfileUpdate extends Component
{
    public $name;
    public $email;
    public $mobile;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->mobile;
    }

    public function updateProfile()
    {

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'mobile' => ['nullable', 'string', 'max:20', 'unique:users,mobile,' . Auth::id()],
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
        ]);
        return back()->with('message', 'Profile updated successfully!');
    }

    public function render()
    {
        $user = Auth::user();
        return view('livewire.dashboard.profile-update', compact('user'));
    }
}
