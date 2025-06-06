<div>
    <h4>Gestión de Alumnos</h4>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="row g-2 mb-3">
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Cédula" wire:model.defer="cedula">
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Nombre" wire:model.defer="nombre">
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Apellido" wire:model.defer="apellido">
        </div>
        <div class="col-md-3">
            <input type="date" class="form-control" wire:model.defer="fecha_nacimiento">
        </div>
        <div class="col-12">
            <button class="btn btn-primary">{{ $isEdit ? 'Actualizar' : 'Guardar' }}</button>
            @if($isEdit)
                <button type="button" class="btn btn-secondary" wire:click="resetFields">Cancelar</button>
            @endif
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha Nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $a)
                <tr>
                    <td>{{ $a->cedula }}</td>
                    <td>{{ $a->nombre }}</td>
                    <td>{{ $a->apellido }}</td>
                    <td>{{ $a->fecha_nacimiento->format('d/m/Y') }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" wire:click="edit({{ $a->id }})">Editar</button>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $a->id }})"
                            onclick="confirm('¿Seguro de eliminar?') || event.stopImmediatePropagation()">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $alumnos->links('vendor.pagination.tailwind', ['pageName' => 'alumnosPage']) }}
</div>
