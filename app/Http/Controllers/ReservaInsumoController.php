<?php

namespace App\Http\Controllers;

use App\Models\ReservaInsumo;
use App\Models\Alumno;
use App\Models\Insumo;
use Illuminate\Http\Request;

class ReservaInsumoController extends Controller
{
    public function index()
    {
        $reservas = ReservaInsumo::with('alumno', 'insumo')->get();
        return view('reserva_insumo.index', compact('reservas'));
    }

    public function create()
    {
        $alumnos = Alumno::all();
        $insumos = Insumo::all();
        return view('reserva_insumo.create', compact('alumnos', 'insumos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_alumnos' => 'required|exists:alumnos,id',
            'id_insumos' => 'required|exists:insumos,id',
            'cantidad_reservada' => 'required|integer|min:1',
        ]);

        ReservaInsumo::create($request->all());

        return redirect()->route('reserva_insumo.index')->with('success', 'Reserva creada.');
    }

    public function edit(ReservaInsumo $reserva_insumo)
    {
        $alumnos = Alumno::all();
        $insumos = Insumo::all();
        return view('reserva_insumo.edit', compact('reserva_insumo', 'alumnos', 'insumos'));
    }

    public function update(Request $request, ReservaInsumo $reserva_insumo)
    {
        $request->validate([
            'id_alumnos' => 'required|exists:alumnos,id',
            'id_insumos' => 'required|exists:insumos,id',
            'cantidad_reservada' => 'required|integer|min:1',
        ]);

        $reserva_insumo->update($request->all());

        return redirect()->route('reserva_insumo.index')->with('success', 'Reserva actualizada.');
    }

    public function destroy(ReservaInsumo $reserva_insumo)
    {
        $reserva_insumo->delete();
        return redirect()->route('reserva_insumo.index')->with('success', 'Reserva eliminada.');
    }
}
