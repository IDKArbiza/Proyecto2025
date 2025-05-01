@extends('layouts.app')

@section('content')
    <h1>Tipos de Obligaciones</h1>

    <a href="{{ route('tipo_obligaciones.create') }}">Nueva Obligación</a>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipos as $tipo)
                <tr>
                    <td>{{ $tipo->nombre_obligacion }}</td>
                    <td>
                        <a href="{{ route('tipo_obligaciones.edit', $tipo) }}">Editar</a>
                        <form action="{{ route('tipo_obligaciones.destroy', $tipo) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Eliminar?')" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
