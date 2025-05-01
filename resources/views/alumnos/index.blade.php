@extends('layouts.app')

@section('content')
    <h1>Lista de Alumnos</h1>

    <a href="{{ route('alumnos.create') }}">Crear Nuevo Alumno</a>

    <table>
        <thead>
            <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->cedula }}</td>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->apellido }}</td>
                    <td>{{ $alumno->fecha_nacimiento }}</td>
                    <td>
                        <a href="{{ route('alumnos.edit', $alumno) }}">Editar</a>
                        <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" style="display:inline;">
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
