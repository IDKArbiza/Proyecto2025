
@extends('layouts.app')

@section('content')
    <h1>Crear Insumo</h1>

    <form method="POST" action="{{ route('insumos.store') }}">
        @csrf
        <input type="text" name="nombre_insumo" placeholder="Nombre del Insumo" required>
        <input type="number" name="precio" placeholder="Precio" required>
        <input type="number" name="Stock" placeholder="Stock" required>
        <button type="submit">Guardar</button>
    </form>
@endsection
