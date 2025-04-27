@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Obligaciones</h1>
    <a href="{{ route('detalle_obligaciones.create') }}" class="btn btn-primary mb-3">Crear nuevo</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Obligación</th>
                <th>Alumno</th>
                <th>Monto</th>
                <th>Fecha Pago</th>
                <th>Fecha Vencimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detalleObligaciones as $detalle)
                <tr>
                    <td>{{ $detalle->id }}</td>
                    <td>{{ $detalle->id_obligaciones }}</td>
                    <td>{{ $detalle->id_alumnos }}</td>
                    <td>{{ $detalle->monto }}</td>
                    <td>{{ $detalle->fecha_pago }}</td>
                    <td>{{ $detalle->fecha_vencimiento }}</td>
                    <td>
                        <a href="{{ route('detalle_obligaciones.edit', $detalle) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('detalle_obligaciones.destroy', $detalle) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
