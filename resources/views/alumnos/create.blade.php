@extends('layouts.app')

@section('content')
    <h1>Crear Alumno</h1>

    <form method="POST" action="{{ route('alumnos.store') }}">
        @csrf
        <input type="number" name="cedula" placeholder="Cédula" required>
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido" placeholder="Apellido" required>
        <input type="date" name="fecha_nacimiento" required>
        <button type="submit">Guardar</button>
    </form>
@endsection
