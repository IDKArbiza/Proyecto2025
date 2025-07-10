<?php

namespace App\Livewire\Alumnos;

use Livewire\Component;
use App\Models\Alumno;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $cedula, $nombre, $apellido, $fecha_nacimiento, $alumno_id;
    public $isEdit = false;

    protected $rules = [
        'cedula' => 'required|integer',
        'nombre' => 'required|string',
        'apellido' => 'required|string',
        'fecha_nacimiento' => 'required|date',
    ];

    public function render()
    {
        return view('livewire.alumnos.index', [
            'alumnos' => Alumno::latest()->paginate(10, ['*'], 'alumnosPage'),
        ]);
    }

    public function resetFields()
    {
        $this->cedula = $this->nombre = $this->apellido = $this->fecha_nacimiento = '';
        $this->isEdit = false;
        $this->alumno_id = null;
    }

    public function store()
    {
        $this->validate();
        Alumno::create($this->only(['cedula', 'nombre', 'apellido', 'fecha_nacimiento']));
        $this->resetFields();
        session()->flash('message', 'Alumno creado correctamente.');
    }

    public function edit($id)
    {
        \Log::info("entra editar " . $id);
        $alumno = Alumno::findOrFail($id);
        $this->alumno_id = $id;
        $this->cedula = $alumno->cedula;
        $this->nombre = $alumno->nombre;
        $this->apellido = $alumno->apellido;
        $this->fecha_nacimiento = $alumno->fecha_nacimiento->format('Y-m-d');
        $this->isEdit = true;
    }

    public function update()
    {
        \Log::info("entra update ".$this->alumno_id );
        //$this->validate();
        \Log::info("entra update 1 ".$this->alumno_id );
        $alumno = Alumno::find($this->alumno_id);
        \Log::info("entra update 2 ".$this->alumno_id );
        $alumno->update($this->only(['cedula', 'nombre', 'apellido', 'fecha_nacimiento']));
        \Log::info("entra update 3 ".$this->alumno_id );
        $this->resetFields();
        \Log::info("entra update ".$this->alumno_id );
        session()->flash('message', 'Alumno actualizado correctamente.');
    }

    public function delete($id)
    {
        Alumno::destroy($id);
        session()->flash('message', 'Alumno eliminado correctamente.');
    }
}
