<?php

namespace App\Livewire\Obligaciones;

use Livewire\Component;
use App\Models\Alumno;
use App\Models\TipoObligacion;
use App\Models\DetalleObligacion;


class Index extends Component
{

    public $lista_obligaciones = [];
    public $id_obligaciones;
    public $id_alumnos;
    public $lista_alumnos = [];
    public $lista_obligacion_alumno = [];
    public $isEdit;
    public $fecha_vencimiento;
    public $monto;
    public function delete($id)
    {
        DetalleObligacion::destroy($id);
        $this->cargar_listas();
        session()->flash('message', 'Registro eliminado correctamente.');

    }

    public function edit($id)
    {
        
    }
    
    protected $rules = [
        'id_alumnos' => 'required',
        'id_obligaciones' => 'required',
        'fecha_vencimiento' => 'required',
        'monto' => 'required|numeric|min:1',
    ];
    public function store()
    {
        $validado=$this->validate();
        DetalleObligacion::create($validado);
        $this->cargar_listas();
        session()->flash('message', 'Obligacion creada correctamente.');
    }
    public function cargar_listas()
    {
        $this->lista_alumnos=Alumno::orderBy('nombre', 'asc')->get();
        $this->lista_obligaciones=TipoObligacion::orderBy('nombre_obligacion', 'asc')->get();
        $this->lista_obligacion_alumno = DetalleObligacion::orderBy('id', 'desc')->get();
        
     //   \Log::info('reserva_index alumnos '.$this->lista_alumnos);
     //   \Log::info('reserva_index insumos '.$this->lista_insumos);
    }
    public function mount()
    {
        $this->cargar_listas();
    }
    public function render()
    {
        return view('livewire.obligaciones.index');

    }



}
