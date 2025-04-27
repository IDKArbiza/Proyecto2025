<?php

namespace App\Services;

use App\Models\DetalleObligacion;

class DetalleObligacionService
{
    public function getAll()
    {
        return DetalleObligacion::all();
    }

    public function create(array $data)
    {
        return DetalleObligacion::create($data);
    }

    public function update(DetalleObligacion $detalleObligacion, array $data)
    {
        return $detalleObligacion->update($data);
    }

    public function delete(DetalleObligacion $detalleObligacion)
    {
        return $detalleObligacion->delete();
    }
}
