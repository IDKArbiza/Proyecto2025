@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Detalle de Obligación</h1>

    <form action="{{ route('detalle_obligaciones.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Obligación ID</label>
            <input type="number" name="id_obligaciones" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alumno ID</label>
            <input type="number" name="id_alumnos" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Monto</label>
            <input type="number" name="monto" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Fecha Pago</label>
            <input type="datetime-local" name="fecha_pago" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Fecha Vencimiento</label>
            <input type="datetime-local" name="fecha_vencimiento" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('detalle_obligaciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
