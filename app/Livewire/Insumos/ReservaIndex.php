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
    public $id_alumnos, $id_insumos;
    public $cedula, $nombre, $apellido, $fecha_nacimiento, $alumno_id;
    public $isEdit = false;

    protected $rules = [
        'id_alumnos' => 'required|numeric',
        'id_insumos' => 'required|numeric',
        'cantidad_reservada' => 'required|numeric',
    ];

    public function render()
    {
        return view('livewire.insumos.reserva-index', [
            'reserva_insumos' => ReservaInsumo::latest()->paginate(10),
        ]);
    }

    public function resetFields()
    {
        $this->isEdit = false;
        $this->id_reserva = null;
    }

    public function edit($id)
    {
        $nombre_alumno = ReservaInsumo::findOrFail($id);
        $this->id_reserva = $id;
        $this->nombre_alumno = $nombre_alumno->nombre_alumno;
        $this->nombre_insumo = $alumno->nombre_insumo;
        $this->cantidad_reservada = $alumno->cantidad_reservada;
        $this->isEdit = true;
    }

    public function store()
    {
        $this->validate();
        ReservaInsumo::create($this->only(['id_insumos', 'id_alumnos', 'cantidad_reservada',]));
        $this->resetFields();
        session()->flash('message', 'Reserva creada correctamente.');
    }
}
