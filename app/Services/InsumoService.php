<?php

namespace App\Services;

use App\Models\Insumo;

class InsumoService
{
    public function getAll()
    {
        return Insumo::all();
    }

    public function create(array $data)
    {
        return Insumo::create($data);
    }

    public function update(Insumo $insumo, array $data)
    {
        return $insumo->update($data);
    }

    public function delete(Insumo $insumo)
    {
        return $insumo->delete();
    }
}
