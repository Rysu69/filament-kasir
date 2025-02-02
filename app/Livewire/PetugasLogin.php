<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PetugasLogin extends Component
{
    public $email;
    public $password;

    public function authenticate()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::guard('petugas')->attempt($credentials)) {
            return redirect()->intended('/petugas');
        }

        $this->addError('email', 'Invalid credentials.');
    }
    public function render()
    {
        return view('livewire.petugas-login');
    }
}
