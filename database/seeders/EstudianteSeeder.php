<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudianteSeeder extends Seeder
{
public function run(): void
{
    // LIMPIAR la tabla primero
    \App\Models\Estudiante::truncate();
    
    // Luego insertar los datos
    DB::table('estudiantes')->insert([
        [
            'nombres' => 'María',
            'apellidos' => 'González',
            'CI' => 12345678,
            'edad' => 20,
            'email' => 'maria@email.com',
            'estado' => true,
            'fecha_creacion' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nombres' => 'Carlos',
            'apellidos' => 'Rodríguez',
            'CI' => 87654321, 
            'edad' => 22,
            'email' => 'carlos@email.com',
            'estado' => true,
            'fecha_creacion' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        // ... más estudiantes
    ]);
}
}