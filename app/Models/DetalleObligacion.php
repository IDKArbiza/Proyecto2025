<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleObligacion extends Model
{
    use HasFactory;

    protected $table = 'detalle_obligaciones';

    protected $fillable = [
        'id_obligaciones',
        'id_alumnos',
        'monto',
        'fecha_pago',
        'fecha_vencimiento',
    ];

    // Relaciones (opcional)
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'id_alumnos');
    }

    public function tipoObligacion()
    {
        return $this->belongsTo(TipoObligacion::class, 'id_obligaciones');
    }
}
