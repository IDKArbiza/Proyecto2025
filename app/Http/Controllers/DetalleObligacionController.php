<?php

namespace App\Http\Controllers;

use App\Models\DetalleObligacion;
use App\Services\DetalleObligacionService;
use Illuminate\Http\Request;

class DetalleObligacionController extends Controller
{
    protected $service;

    public function __construct(DetalleObligacionService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $detalleObligaciones = $this->service->getAll();
        return view('detalle_obligaciones.index', compact('detalleObligaciones'));
    }

    public function create()
    {
        return view('detalle_obligaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_obligaciones' => 'required|integer',
            'id_alumnos' => 'required|integer',
            'monto' => 'required|integer',
            'fecha_pago' => 'required|date',
            'fecha_vencimiento' => 'required|date',
        ]);

        $this->service->create($request->all());
        return redirect()->route('detalle_obligaciones.index')->with('success', 'Detalle de obligación creado exitosamente.');
    }

    public function edit(DetalleObligacion $detalleObligacion)
    {
        return view('detalle_obligaciones.edit', compact('detalleObligacion'));
    }

    public function update(Request $request, DetalleObligacion $detalleObligacion)
    {
        $request->validate([
            'id_obligaciones' => 'required|integer',
            'id_alumnos' => 'required|integer',
            'monto' => 'required|integer',
            'fecha_pago' => 'required|date',
            'fecha_vencimiento' => 'required|date',
        ]);

        $this->service->update($detalleObligacion, $request->all());
        return redirect()->route('detalle_obligaciones.index')->with('success', 'Detalle de obligación actualizado exitosamente.');
    }

    public function destroy(DetalleObligacion $detalleObligacion)
    {
        $this->service->delete($detalleObligacion);
        return redirect()->route('detalle_obligaciones.index')->with('success', 'Detalle de obligación eliminado.');
    }
}
