@extends('layouts.app')

@section('content')
    <h1>Editar Alumno</h1>

    <form method="POST" action="{{ route('alumnos.update', $alumno) }}">
        @csrf
        @method('PUT')
        <input type="number" name="cedula" value="{{ $alumno->cedula }}" required>
        <input type="text" name="nombre" value="{{ $alumno->nombre }}" required>
        <input type="text" name="apellido" value="{{ $alumno->apellido }}" required>
        <input type="date" name="fecha_nacimiento" value="{{ $alumno->fecha_nacimiento->format('Y-m-d') }}" required>
        <button type="submit">Actualizar</button>
    </form>
@endsection
