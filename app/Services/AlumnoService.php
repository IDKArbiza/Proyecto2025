<?php

namespace App\Services;

use App\Models\Alumno;

class AlumnoService
{
    public function getAll()
    {
        return Alumno::all();
    }

    public function create(array $data)
    {
        return Alumno::create($data);
    }

    public function update(Alumno $alumno, array $data)
    {
        return $alumno->update($data);
    }

    public function delete(Alumno $alumno)
    {
        return $alumno->delete();
    }
}
