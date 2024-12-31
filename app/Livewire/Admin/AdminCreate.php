<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminCreate extends Component
{
    public $admName;
    public $admEmail;
    public $admPwd;
    public $admPwd_confirmation;

    protected $rules = [
        'admName' => 'required|string|max:255',
        'admEmail' => 'required|string|email|max:255|unique:users,email',
        'admPwd' => 'required|confirmed',
    ];

    public function mount()
    {
        $this->rules['admPwd'] = [
            'required',
            'confirmed',
            Password::min(8)->letters()->mixedCase()->numbers()->symbols()
        ];
    }

    public function submit()
    {
        $this->validate();

        User::create([
            'name' => $this->admName,
            'email' => $this->admEmail,
            'password' => Hash::make($this->admPwd),
            'role' => 'admin', // Assuming you have a role field to distinguish admin users
        ]);

        session()->flash('message', 'Admin created successfully.');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.admin-create');
    }
}