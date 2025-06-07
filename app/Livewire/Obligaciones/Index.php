<?php

namespace App\Livewire\Obligaciones;

use Livewire\Component;
use App\Models\Alumno;
use App\Models\TipoObligacion;
use App\Models\DetalleObligacion;
use Carbon\Carbon;

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
    public $id_registro_editar;
    public function delete($id)
    {
        DetalleObligacion::destroy($id);
        $this->cargar_listas();
        session()->flash('message', 'Registro eliminado correctamente.');
    }

    public function edit($id)
    {
        $dato = DetalleObligacion::findOrFail($id);
        \Log::info("DETALLE OBLIGACION " . $dato);
        $this->id_registro_editar = $id;
        $this->id_obligaciones = $dato->id_obligaciones;
        $this->id_alumnos = $dato->id_alumnos;
        $this->monto = $dato->monto;
        $this->fecha_vencimiento = $dato->fecha_vencimiento->format('Y-m-d');
        \Log::info("DETALLE FECHA " . $this->fecha_vencimiento);
        $this->isEdit = true;
    }
    
    public function update()
    {
        $dato = DetalleObligacion::findOrFail($this->id_registro_editar);
        $dato->update($this->only('monto','fecha_vencimiento'));
        $this->cargar_listas();
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->id_registro_editar = null;
        $this->id_obligaciones = null;
        $this->id_alumnos = null;
        $this->monto = null;
        $this->fecha_vencimiento = null;
        $this->isEdit = false;
    }

    public function pagar($id)
    {
        $dato = DetalleObligacion::findOrFail($id);
        $fecha = Carbon::today();
        \Log::info("FECHA A ACTUALIZAR " . $fecha);
        $dato->fecha_pago = $fecha;
        $dato->save();
        $this->cargar_listas();
        session()->flash('message', 'Obligacion pagada correctamente.');
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
        $this->resetFields();
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
