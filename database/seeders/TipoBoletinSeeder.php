<?php

namespace Database\Seeders;

use App\Models\TipoBoletin;
use Illuminate\Database\Seeder;

class TipoBoletinSeeder extends Seeder
{
    public function run(): void
    {
        $tiposBoletines = [
            'Búsqueda Inmediata',
            'Larga Data',
            'Uso Interno',
        ];

        foreach ($tiposBoletines as $tipoBoletin) {
            TipoBoletin::create([
                'nombre' => $tipoBoletin,
            ]);
        }
    }
}
