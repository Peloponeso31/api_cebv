<?php

namespace Database\Seeders;

use App\Models\Pasatiempo;
use Illuminate\Database\Seeder;

class PasatiempoSeeder extends Seeder
{
    public function run(): void
    {
        $pasatiempos = [
            'Leer',
            'Escribir',
            'Dibujar',
            'Pintar',
            'Cocinar',
            'Jardinería',
            'Manualidades',
            'Cine',
            'Música',
            'Danza',
            'Teatro',
            'Ajedrez',
            'Fotografía',
        ];

        foreach ($pasatiempos as $pasatiempo) {
            Pasatiempo::create(['nombre' => $pasatiempo]);
        }
    }
}
