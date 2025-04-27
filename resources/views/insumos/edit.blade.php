@extends('layouts.app')

@section('content')
    <h1>Editar Insumo</h1>

    <form method="POST" action="{{ route('insumos.update', $insumo) }}">
        @csrf
        @method('PUT')
        <input type="text" name="nombre_insumo" value="{{ $insumo->nombre_insumo }}" required>
        <input type="number" name="precio" value="{{ $insumo->precio }}" required>
        <input type="number" name="Stock" value="{{ $insumo->Stock }}" required>
        <button type="submit">Actualizar</button>
    </form>
@endsection
