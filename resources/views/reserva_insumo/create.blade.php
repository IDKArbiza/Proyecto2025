@extends('layouts.app')

@section('content')
    <h1>Crear Reserva</h1>

    <form action="{{ route('reserva_insumo.store') }}" method="POST">
        @csrf
        <label>Alumno:</label>
        <select name="id_alumnos" required>
            @foreach ($alumnos as $alumno)
                <option value="{{ $alumno->id }}">{{ $alumno->nombre }} {{ $alumno->apellido }}</option>
            @endforeach
        </select>

        <label>Insumo:</label>
        <select name="id_insumos" required>
            @foreach ($insumos as $insumo)
                <option value="{{ $insumo->id }}">{{ $insumo->nombre_insumo }}</option>
            @endforeach
        </select>

        <label>Cantidad:</label>
        <input type="number" name="cantidad_reservada" min="1" required>

        <button type="submit">Guardar</button>
    </form>
@endsection
