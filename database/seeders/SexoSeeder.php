<?php

namespace Database\Seeders;

use App\Models\Sexo;
use Illuminate\Database\Seeder;

class SexoSeeder extends Seeder
{
    public function run(): void
    {
        $sexos = [
            'Hombre', // Importante no mover de lugar, se espera ID = 1
            'Mujer', // Importante no mover de lugar, se espera ID = 2
            'No binario',
            'No especificado'
        ];

        foreach ($sexos as $sexo) {
            Sexo::create(['nombre' => $sexo]);
        }
    }
}
