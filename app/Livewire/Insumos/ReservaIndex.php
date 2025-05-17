<?php

namespace App\Livewire\Insumos;

use Livewire\Component;
use App\Models\ReservaInsumo;
use Livewire\WithPagination;

class ReservaIndex extends Component
{

    use WithPagination;

    public $id_reserva;
    public $nombre_alumno, $nombre_insumo, $cantidad_reservada;
    public $cedula, $nombre, $apellido, $fecha_nacimiento, $alumno_id;
    public $isEdit = false;

    public function render()
    {
        return view('livewire.insumos.reserva-index', [
            'reserva_insumos' => ReservaInsumo::latest()->paginate(10),
        ]);
    }
}
