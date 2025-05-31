<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{

    public $seccion;
    public function render()
    {
        return view('livewire.admin.dashboard')->layout('layouts.app');
    }
}
