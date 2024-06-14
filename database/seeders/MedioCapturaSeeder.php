<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MedioCapturaSeeder extends Seeder
{
    public function run(): void
    {
        $mediosCaptura = [
            'ARMAS BLANCAS',
            'ARMAS DE FUEGO CORTAS',
            'ARMAS DE FUEGO LARGAS',
            'OTRO',
            'SIN INFORMACION',
        ];
    }
}
