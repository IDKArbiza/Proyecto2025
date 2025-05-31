<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\TipoObligacion;
use Livewire\WithPagination;

class IndexDetalleObligacion extends Component
{
    use WithPagination;

    public $nombre_obligacion;
    public $isEdit = false;
    public $id_tipo;

    protected $rules = [
        'nombre_obligacion' => 'required|string',
    ];

    public function render()
    {
        return view('livewire.admin.index-detalle-obligacion', [
            'tipo_obligaciones' => TipoObligacion::orderBy('nombre_obligacion')->paginate(10, ['*'], 'tipobligacionPage'),
        ]);
    }

    public function resetFields()
    {
        $this->nombre_obligacion = '';
        $this->id_tipo=0;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate();
        TipoObligacion::create($this->only(['nombre_obligacion']));
        $this->resetFields();
        session()->flash('message', 'Tipo Obligacion creado correctamente.');
    }

    public function edit($id)
    {
        $tipo_obligacion = TipoObligacion::findOrFail($id);
        $this->nombre_obligacion = $tipo_obligacion->nombre_obligacion;
        $this->isEdit = true;
        $this->id_tipo = $id;
    }

    public function update()
    {
        $this->validate();
        $tipo_obligacion = TipoObligacion::findOrFail($this->id_tipo);
        $tipo_obligacion->update($this->only(['nombre_obligacion']));
        $this->resetFields();
        session()->flash('message', 'Tipo Obligacion actualizado correctamente.');
    }

    public function delete($id)
    {
        TipoObligacion::destroy($id);
        session()->flash('message', 'Tipo Obligacion eliminado correctamente.');
    }
}
