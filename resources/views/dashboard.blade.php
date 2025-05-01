@extends('layouts.app')

@section('content')
    <h1 class="mb-4">📊 Panel de Administración</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Card: Alumnos -->
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">📘 Alumnos</h5>
                    <p class="card-text">Ver y gestionar los alumnos registrados.</p>
                    <a href="{{ route('alumnos.index') }}" class="btn btn-primary">Ver sección</a>
                </div>
            </div>
        </div>

        <!-- Card: Insumos -->
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">📦 Insumos</h5>
                    <p class="card-text">Control y gestión de insumos disponibles.</p>
                    <a href="{{ route('insumos.index') }}" class="btn btn-primary">Ver sección</a>
                </div>
            </div>
        </div>

        <!-- Card: Detalle Obligaciones -->
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">💰 Detalle Obligaciones</h5>
                    <p class="card-text">Registrar y consultar pagos de alumnos.</p>
                    <a href="{{ route('detalle_obligaciones.index') }}" class="btn btn-primary">Ver sección</a>
                </div>
            </div>
        </div>

        <!-- Card: Tipo de Obligaciones -->
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">📄 Tipos de Obligaciones</h5>
                    <p class="card-text">Administrar los tipos de obligaciones.</p>
                    <a href="{{ route('tipo_obligaciones.index') }}" class="btn btn-primary">Ver sección</a>
                </div>
            </div>
        </div>

        <!-- Card: Reserva Insumo -->
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">📝 Reservas de Insumos</h5>
                    <p class="card-text">Consultar y registrar reservas de insumos.</p>
                    <a href="{{ route('reserva_insumo.index') }}" class="btn btn-primary">Ver sección</a>
                </div>
            </div>
        </div>
    </div>
@endsection
