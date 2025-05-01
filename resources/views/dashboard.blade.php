@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <p>Bienvenido al panel principal. Selecciona una sección:</p>

    <ul>
        <li><a href="{{ route('alumnos.index') }}">📘 Alumnos</a></li>
        <li><a href="{{ route('insumos.index') }}">📦 Insumos</a></li>
        <li><a href="{{ route('detalle_obligaciones.index') }}">💰 Detalle Obligaciones</a></li>
        <li><a href="{{ route('tipo_obligaciones.index') }}">📄 Tipo de Obligaciones</a></li>
        <li><a href="{{ route('reserva_insumo.index') }}">📝 Reservas de Insumos</a></li>
    </ul>
@endsection
