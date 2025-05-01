@extends('layouts.app')

@section('content')
    <h1>Crear Tipo de Obligación</h1>

    <form action="{{ route('tipo_obligaciones.store') }}" method="POST">
        @csrf
        <input type="text" name="nombre_obligacion" placeholder="Nombre de la obligación" required>
        <button type="submit">Guardar</button>
    </form>
@endsection
