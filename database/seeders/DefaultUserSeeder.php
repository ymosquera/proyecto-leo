<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un usuario por defecto si no existe
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Busca por este campo
            [
                'name' => 'Administrador',
                'password' => Hash::make('password123'), // Contraseña cifrada
            ]
        );       //
    }
}
