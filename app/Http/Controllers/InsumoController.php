<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Services\InsumoService;
use Illuminate\Http\Request;

class InsumoController extends Controller
{
    protected $service;

    public function __construct(InsumoService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $insumos = $this->service->getAll();
        return view('insumos.index', compact('insumos'));
    }

    public function create()
    {
        return view('insumos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_insumo' => 'required|string|max:255',
            'precio' => 'required|integer',
            'Stock' => 'required|integer',
        ]);

        $this->service->create($validated);

        return redirect()->route('insumos.index')->with('success', 'Insumo creado correctamente.');
    }

    public function edit(Insumo $insumo)
    {
        return view('insumos.edit', compact('insumo'));
    }

    public function update(Request $request, Insumo $insumo)
    {
        $validated = $request->validate([
            'nombre_insumo' => 'required|string|max:255',
            'precio' => 'required|integer',
            'Stock' => 'required|integer',
        ]);

        $this->service->update($insumo, $validated);

        return redirect()->route('insumos.index')->with('success', 'Insumo actualizado correctamente.');
    }

    public function destroy(Insumo $insumo)
    {
        $this->service->delete($insumo);

        return redirect()->route('insumos.index')->with('success', 'Insumo eliminado correctamente.');
    }
}
