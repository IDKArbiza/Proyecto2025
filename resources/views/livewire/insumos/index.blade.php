<div>
    <h4>Gestión de Insumos</h4>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="Nombre del Insumo" wire:model.defer="nombre_insumo">
        </div>
        <div class="col-md-3">
            <input type="number" wire:model.defer="precio" class="form-control" placeholder="Precio">
            @error('precio') <small class="text-danger">{{ $message }}</small> @enderror

        </div>
        <div class="col-md-3">
            <input type="number" wire:model.defer="stock" class="form-control" placeholder="Stock">
            @error('stock') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100">{{ $isEdit ? 'Actualizar' : 'Guardar' }}</button>
            @if($isEdit)
                <button type="button" class="btn btn-secondary mt-2 w-100" wire:click="resetFields">Cancelar</button>
            @endif
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($insumos as $insumo)
                <tr>
                    <td>{{ $insumo->nombre_insumo }}</td>
                    <td>Gs. {{ number_format($insumo->precio, 0,',','.') }}</td>
                    <td>{{ $insumo->stock }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" wire:click="edit({{ $insumo->id }})">Editar</button>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $insumo->id }})"
                            onclick="confirm('¿Eliminar este insumo?') || event.stopImmediatePropagation()">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- $insumos->links() --}}
</div>
