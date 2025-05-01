@extends('layouts.app')

@section('content')
    <h1>Editar Tipo de Obligación</h1>

    <form action="{{ route('tipo_obligaciones.update', $tipo_obligacion) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nombre_obligacion" value="{{ $tipo_obligacion->nombre_obligacion }}" required>
        <button type="submit">Actualizar</button>
    </form>
@endsection
