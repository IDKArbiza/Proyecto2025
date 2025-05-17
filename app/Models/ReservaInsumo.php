<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaInsumo extends Model
{
    use HasFactory;

    protected $table = 'reserva_insumo';

    protected $fillable = [
        'id_insumos',
        'id_alumnos',
        'cantidad_reservada',
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'id_alumnos');
    }

    public function insumo()
    {
        return $this->belongsTo(Insumo::class, 'id_insumos');
    }

    public function getNombreAlumnoAttribute()
    {
        if (!$this->alumno) return null;
        return $this->alumno->nombre . ' ' . $this->alumno->apellido;
    }

    // ✅ Accessor para nombre del insumo
    public function getNombreInsumoAttribute()
    {
        return $this->insumo->nombre_insumo ?? null;
    }
}
