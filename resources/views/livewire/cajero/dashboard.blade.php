<div class="d-flex" style="height: 100vh;">
    <!-- Sidebar -->
    <div class="bg-dark text-white p-3" style="width: 250px;">
        <h4 class="mb-4">Panel Cajero</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="#" wire:click="$set('seccion', 'alumnos')" class="nav-link text-white">Gestión de Alumnos</a>
            </li>
            <li class="nav-item">
                <a href="#" wire:click="$set('seccion', 'insumos')" class="nav-link text-white">Gestión de Insumos</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">
        <div class="alert alert-success">
            <h1 class="h3">Panel del Cajero</h1>
            <p>Bienvenido {{ Auth::user()->name }}.</p>
        </div>

        @if ($seccion === 'alumnos')
            @livewire('alumnos.index')
        @elseif ($seccion === 'insumos')
            @livewire('insumos.index')
        @else
            <p>Seleccione una opción del panel lateral.</p>
        @endif
    </div>
</div>
