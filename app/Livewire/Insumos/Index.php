<?php

namespace App\Livewire\Insumos;

use Livewire\Component;
use App\Models\Insumo;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $nombre_insumo, $precio, $stock, $insumo_id;
    public $isEdit = false;

    protected $rules = [
        'nombre_insumo' => 'required|string',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
    ];

    public function messages()
    {
        return [
            'nombre_insumo.required' => 'El nombre del insumo es obligatorio.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'precio.min' => 'El precio no puede ser negativo.',
            'stock.required' => 'El stock es obligatorio.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'stock.min' => 'El stock no puede ser negativo.',
        ];
    }

    public function render()
    {
        return view('livewire.insumos.index', [
            'insumos' => Insumo::latest()->paginate(10),
        ]);
    }

    public function resetFields()
    {
        $this->nombre_insumo = $this->precio = $this->stock = '';
        $this->insumo_id = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate();
        Insumo::create($this->only(['nombre_insumo', 'precio', 'stock']));
        $this->resetFields();
        session()->flash('message', 'Insumo creado correctamente.');
    }

    public function edit($id)
    {
        $insumo = Insumo::findOrFail($id);
        $this->insumo_id = $insumo->id;
        $this->nombre_insumo = $insumo->nombre_insumo;
        $this->precio = $insumo->precio;
        $this->stock = $insumo->stock;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate();
        $insumo = Insumo::find($this->insumo_id);
        $insumo->update($this->only(['nombre_insumo', 'precio', 'stock']));
        $this->resetFields();
        session()->flash('message', 'Insumo actualizado correctamente.');
    }

    public function delete($id)
    {
        Insumo::destroy($id);
        session()->flash('message', 'Insumo eliminado correctamente.');
    }
}
