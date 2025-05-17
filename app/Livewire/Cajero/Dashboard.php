<?php

namespace App\Livewire\Cajero;

use Livewire\Component;

class Dashboard extends Component
{
    public $seccion = null;

    public function render()
    {
        return view('livewire.cajero.dashboard')->layout('layouts.app');
    }
}
