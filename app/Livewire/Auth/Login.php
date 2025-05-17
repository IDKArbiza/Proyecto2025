<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email, $password;

    public function login()
    {
        $credentials = ['email' => $this->email, 'password' => $this->password];

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            $role = Auth::user()->role;

            return match ($role) {
                'administrador' => redirect()->route('admin.dashboard'),
                'cajero' => redirect()->route('cajero.dashboard'),
                default => redirect()->route('usuario.dashboard'),
            };
        }

        $this->addError('email', 'Credenciales incorrectas.');
    }


    public function redirectTo()
    {
        $role = Auth::user()->role;
        return match ($role) {
            'administrador' => 'admin.dashboard',
            'cajero' => 'cajero.dashboard',
            default => 'usuario.dashboard',
        };
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}

