<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Principal',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'administrador',
        ]);

        User::create([
            'name' => 'Cajero Uno',
            'email' => 'cajero@example.com',
            'password' => Hash::make('cajero123'),
            'role' => 'cajero',
        ]);

        User::create([
            'name' => 'Usuario Común',
            'email' => 'usuario@example.com',
            'password' => Hash::make('usuario123'),
            'role' => 'usuario',
        ]);
    }
}
