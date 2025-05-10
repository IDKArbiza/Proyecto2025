<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AlumnoSeeder extends Seeder
{
    public function run(): void
    {
        $nombresHombres = ['Lucas', 'Mateo', 'Juan', 'Tomás', 'Agustín', 'Santiago', 'Nicolás', 'Emiliano', 'Martín', 'Facundo'];
        $nombresMujeres = ['Camila', 'Lucía', 'Valentina', 'Sofía', 'Martina', 'Mía', 'Emma', 'Julieta', 'Agustina', 'Catalina'];
        $apellidos = ['Gómez', 'Fernández', 'Pérez', 'Rodríguez', 'López', 'Martínez', 'García', 'Díaz', 'Sánchez', 'Romero'];

        $alumnos = [];

        for ($i = 0; $i < 30; $i++) {
            $nombre = $nombresHombres[array_rand($nombresHombres)];
            $apellido = $apellidos[array_rand($apellidos)];
            $alumnos[] = [
                'cedula' => 10000000 + $i,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'fecha_nacimiento' => Carbon::parse('2008-01-01')->addDays(rand(0, 2000)),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        for ($i = 0; $i < 30; $i++) {
            $nombre = $nombresMujeres[array_rand($nombresMujeres)];
            $apellido = $apellidos[array_rand($apellidos)];
            $alumnos[] = [
                'cedula' => 20000000 + $i,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'fecha_nacimiento' => Carbon::parse('2008-01-01')->addDays(rand(0, 2000)),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('alumnos')->insert($alumnos);
    }
}
