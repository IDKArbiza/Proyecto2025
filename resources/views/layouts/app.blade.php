<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Aplicación</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Si usás CSS -->
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <nav>
    <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
    <a href="{{ route('alumnos.index') }}">Alumnos</a>
    <a href="{{ route('insumos.index') }}">Insumos</a>
    <a href="{{ route('detalle_obligaciones.index') }}">Obligaciones</a>
    <a href="{{ route('reserva_insumo.index') }}">Reservas</a>
</nav>

</body>
</html>
