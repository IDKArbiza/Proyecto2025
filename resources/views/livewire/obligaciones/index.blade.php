<div>
    <h4>Gestión de Obligaciones</h4>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="row g-2 mb-3">
        <div class="col-md-3">
            <label class="form-label">Obligaciones</label>
            <select wire:model.defer="id_obligaciones" class="form-control w-100" size="5">
                <option value="" disabled>-- Seleccione una obligacion --</option>
                @foreach($lista_obligaciones as $obligaciones)
                    <option value="{{ $obligaciones->id }}">
                        {{ $obligaciones->nombre_obligacion }} 
                    </option>
                @endforeach
            </select>
            @error('id_obligaciones') 
            <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="col-md-3">
            <label class="form-label">Alumno</label>
                <select wire:model.defer="id_alumnos" class="form-control w-100" size="5">
                    <option value="" disabled>-- Seleccione un alumno --</option>
                    @foreach($lista_alumnos as $alumno)
                        <option value="{{ $alumno->id }}">
                            {{ $alumno->nombre }}, {{ $alumno->apellido}}
                        </option>
                    @endforeach
                </select>
                @error('id_alumnos') 
                <span class="text-danger">{{ $message }}</span> 
                @enderror
            </div>
        <div class="col-md-3">
            <label class="form-label">Fecha de Vencimiento</label>
            <input type="date" class="form-control" wire:model.defer="fecha_vencimiento">
            @error('fecha_vencimiento') 
                <span class="text-danger">{{ $message }}</span> 
            @enderror
            <label class="form-label">Monto</label>
            <input type="text" class="form-control" wire:model.defer="monto">
            @error('monto') 
                <span class="text-danger">{{ $message }}</span> 
            @enderror
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
            @foreach($lista_obligacion_alumno as $a)
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
