<div class="d-flex" style="height: 100vh;">
    <!-- Sidebar -->
    <div class="bg-dark text-white p-3" style="width: 250px;">
        <h4 class="mb-4">Panel Administrador</h4>
        <p>Bienvenido {{ Auth::user()->name }}.</p>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="#" wire:click="$set('seccion', 'alumnos')" class="nav-link text-white"></a>
            </li>
            <li class="nav-item">
                <a href="#" wire:click="$set('seccion', 'obligaciones')" class="nav-link text-white">Gestión de Obligaciones</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">
        <div class="alert alert-success">
            <h1 class="h3">Panel del Administrador</h1>
            <p>Bienvenido {{ Auth::user()->name }}.</p>
        </div>

        @if ($seccion === 'obligaciones')
            @livewire('admin.index-detalle-obligacion')
        @elseif ($seccion === 'insumos')
            @livewire('insumos.index')
        @else
            <p>Seleccione una opción del panel lateral.</p>
        @endif
    </div>
</div>


