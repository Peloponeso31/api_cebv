<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    public function run(): void
    {
        $generos = [
            'Masculino',
            'Femenino',
            'Otra situación',
            'No especificado'
        ];

        foreach ($generos as $genero) {
            Genero::create([
                'nombre' => $genero
            ]);
        }
    }
}
