<div>
    <h4>Gestión de Alumnos</h4>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="row g-2 mb-3">
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Insumo" wire:model.defer="id_insumos">
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Alumno" wire:model.defer="id_alumnos">
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Cantidad" wire:model.defer="cantidad_reservada">
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
                <th>Alumno</th>
                <th>Insumo</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reserva_insumos as $a)
                <tr>
                    <td>{{ $a->nombre_alumno }}</td>
                    <td>{{ $a->nombre_insumo }}</td>
                    <td>{{ number_format($a->cantidad_reservada, 0, ',', '.') }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" wire:click="edit({{ $a->id }})">Editar</button>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $a->id }})"
                            onclick="confirm('¿Seguro de eliminar?') || event.stopImmediatePropagation()">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- $alumnos->links() --}}
</div>
