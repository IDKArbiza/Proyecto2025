@extends('layouts.app')

@section('content')
    <h1>Lista de Insumos</h1>

    <a href="{{ route('insumos.create') }}">Crear Nuevo Insumo</a>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($insumos as $insumo)
                <tr>
                    <td>{{ $insumo->nombre_insumo }}</td>
                    <td>{{ $insumo->precio }}</td>
                    <td>{{ $insumo->Stock }}</td>
                    <td>
                        <a href="{{ route('insumos.edit', $insumo) }}">Editar</a>
                        <form action="{{ route('insumos.destroy', $insumo) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
