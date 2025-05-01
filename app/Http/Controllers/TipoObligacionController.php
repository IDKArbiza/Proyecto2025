<?php

namespace App\Http\Controllers;

use App\Models\TipoObligacion;
use Illuminate\Http\Request;

class TipoObligacionController extends Controller
{
    public function index()
    {
        $tipos = TipoObligacion::all();
        return view('tipo_obligaciones.index', compact('tipos'));
    }

    public function create()
    {
        return view('tipo_obligaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_obligacion' => 'required|string|max:255',
        ]);

        TipoObligacion::create($request->all());

        return redirect()->route('tipo_obligaciones.index')->with('success', 'Obligación creada correctamente.');
    }

    public function edit(TipoObligacion $tipo_obligacion)
    {
        return view('tipo_obligaciones.edit', compact('tipo_obligacion'));
    }

    public function update(Request $request, TipoObligacion $tipo_obligacion)
    {
        $request->validate([
            'nombre_obligacion' => 'required|string|max:255',
        ]);

        $tipo_obligacion->update($request->all());

        return redirect()->route('tipo_obligaciones.index')->with('success', 'Obligación actualizada correctamente.');
    }

    public function destroy(TipoObligacion $tipo_obligacion)
    {
        $tipo_obligacion->delete();

        return redirect()->route('tipo_obligaciones.index')->with('success', 'Obligación eliminada correctamente.');
    }
}
