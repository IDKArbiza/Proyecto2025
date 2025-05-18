<?php

namespace App\Livewire\Usuario;

use Livewire\Component;

class Dashboard extends Component
{
    public $seccion = null;

    public function render()
    {
        return view('livewire.usuario.dashboard')->layout('layouts.app');
    }
}
