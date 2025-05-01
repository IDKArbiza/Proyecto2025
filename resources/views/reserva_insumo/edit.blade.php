@extends('layouts.app')

@section('content')
    <h1>Editar Reserva</h1>

    <form action="{{ route('reserva_insumo.update', $reserva_insumo) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Alumno:</label>
        <select name="id_alumnos" required>
            @foreach ($alumnos as $alumno)
                <option value="{{ $alumno->id }}" {{ $alumno->id == $reserva_insumo->id_alumnos ? 'selected' : '' }}>
                    {{ $alumno->nombre }} {{ $alumno->apellido }}
                </option>
            @endforeach
        </select>

        <label>Insumo:</label>
        <select name="id_insumos" required>
            @foreach ($insumos as $insumo)
                <option value="{{ $insumo->id }}" {{ $insumo->id == $reserva_insumo->id_insumos ? 'selected' : '' }}>
                    {{ $insumo->nombre_insumo }}
                </option>
            @endforeach
        </select>

        <label>Cantidad:</label>
        <input type="number" name="cantidad_reservada" value="{{ $reserva_insumo->cantidad_reservada }}" min="1" required>

        <button type="submit">Actualizar</button>
    </form>
@endsection
