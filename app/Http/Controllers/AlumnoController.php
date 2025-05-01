<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Services\AlumnoService;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    protected $service;

    public function __construct(AlumnoService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $alumnos = $this->service->getAll();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cedula' => 'required|integer|unique:alumnos,cedula',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
        ]);

        $this->service->create($validated);

        return redirect()->route('alumnos.index')->with('success', 'Alumno creado correctamente.');
    }

    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $validated = $request->validate([
            'cedula' => 'required|integer|unique:alumnos,cedula,' . $alumno->id,
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
        ]);

        $this->service->update($alumno, $validated);

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente.');
    }

    public function destroy(Alumno $alumno)
    {
        $this->service->delete($alumno);

        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente.');
    }
}
