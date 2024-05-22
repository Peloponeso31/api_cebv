<?php

namespace Database\Seeders;

use App\Models\Sexo;
use Illuminate\Database\Seeder;

class SexoSeeder extends Seeder
{
    public function run(): void
    {
        $sexos = [
            'Hombre',
            'Mujer',
            'Otra situación',
            'No especificado'
        ];

        foreach ($sexos as $sexo) {
            Sexo::create([
                'nombre' => $sexo
            ]);
        }
    }
}
