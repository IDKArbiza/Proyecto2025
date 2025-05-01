@extends('layouts.app')

@section('content')
    <h1>Reservas de Insumos</h1>
    <a href="{{ route('reserva_insumo.create') }}">Nueva Reserva</a>

    <table>
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Insumo</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->alumno->nombre }} {{ $reserva->alumno->apellido }}</td>
                    <td>{{ $reserva->insumo->nombre_insumo }}</td>
                    <td>{{ $reserva->cantidad_reservada }}</td>
                    <td>
                        <a href="{{ route('reserva_insumo.edit', $reserva) }}">Editar</a>
                        <form action="{{ route('reserva_insumo.destroy', $reserva) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Eliminar reserva?')" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
