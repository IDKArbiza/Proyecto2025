<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsumoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('insumos')->insert([
            ['nombre_insumo' => 'Uniforme varón completo', 'precio' => 15000, 'Stock' => 25],
            ['nombre_insumo' => 'Uniforme mujer completo', 'precio' => 14800, 'Stock' => 30],
            ['nombre_insumo' => 'Campera escolar', 'precio' => 12000, 'Stock' => 20],
            ['nombre_insumo' => 'Remera escolar', 'precio' => 4500, 'Stock' => 40],
            ['nombre_insumo' => 'Buzo deportivo', 'precio' => 6000, 'Stock' => 35],
            ['nombre_insumo' => 'Medias deportivas', 'precio' => 1800, 'Stock' => 50],
            ['nombre_insumo' => 'Cuaderno de 100 hojas', 'precio' => 950, 'Stock' => 100],
            ['nombre_insumo' => 'Cuaderno de 200 hojas', 'precio' => 1800, 'Stock' => 80],
            ['nombre_insumo' => 'Libro Matemática 1er año', 'precio' => 8900, 'Stock' => 10],
            ['nombre_insumo' => 'Libro Lengua 2do año', 'precio' => 8700, 'Stock' => 12],
            ['nombre_insumo' => 'Libro Ciencias Naturales', 'precio' => 9200, 'Stock' => 15],
            ['nombre_insumo' => 'Cartuchera básica', 'precio' => 2000, 'Stock' => 45],
            ['nombre_insumo' => 'Mochila escolar', 'precio' => 13500, 'Stock' => 18],
            ['nombre_insumo' => 'Guardapolvo blanco', 'precio' => 7500, 'Stock' => 22],
            ['nombre_insumo' => 'Set de geometría', 'precio' => 2600, 'Stock' => 60],
        ]);
    }
}
