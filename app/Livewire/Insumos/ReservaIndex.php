<?php

namespace App\Livewire\Insumos;

use Livewire\Component;
use App\Models\ReservaInsumo;
use Livewire\WithPagination;
use App\Models\Alumno;
use App\Models\Insumo;

class ReservaIndex extends Component
{

    use WithPagination;

    public $id_reserva;
    public $nombre_alumno, $nombre_insumo, $cantidad_reservada;
    public $id_alumnos, $id_insumos;
    public $cedula, $nombre, $apellido, $fecha_nacimiento, $alumno_id; 
    public $lista_alumnos, $lista_insumos;
    public $isEdit = false;

    protected $rules = [
        'id_alumnos' => 'required|numeric',
        'id_insumos' => 'required|numeric',
        'cantidad_reservada' => 'required|numeric',
    ];

    public function reload_data()
    {
        $this->lista_alumnos=Alumno::orderBy('nombre', 'asc')->get();
        $this->lista_insumos=Insumo::orderBy('nombre_insumo', 'asc')->get();
        \Log::info('reserva_index alumnos '.$this->lista_alumnos);
        \Log::info('reserva_index insumos '.$this->lista_insumos);
    }

    public function mount()
    {
        $this->reload_data();
    }
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
        $reserva = ReservaInsumo::findOrFail($id);
        $this->id_reserva = $id;
        $this->nombre_alumno = $reserva->nombre_alumno;
        $this->nombre_insumo = $reserva->nombre_insumo;
        $this->cantidad_reservada = $reserva->cantidad_reservada;
        $this->isEdit = true;
    }

    public function store()
    {
        $this->validate();
        ReservaInsumo::create($this->only(['id_insumos', 'id_alumnos', 'cantidad_reservada',]));
        $this->resetFields();
        session()->flash('message', 'Reserva creada correctamente.');
    }

    public function update()
    {
        $this->validate();
        $reservaUpd = ReservaInsumo::find($this->id_reserva);
        $reservaUpd->update($this->only(['cantidad_reservada',]));
        $this->resetFields();
        session()->flash('message', 'Reserva actualizada correctamente.');
    }

    public function delete($id)
    {
        ReservaInsumo::destroy($id);
        session()->flash('message', 'Reserva eliminada correctamente.');
    }
}
