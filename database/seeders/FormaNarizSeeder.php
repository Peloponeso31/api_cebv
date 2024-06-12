<?php

namespace Database\Seeders;

use App\Models\Catalogos\CaracteristicasFisicas\TipoNariz;
use Illuminate\Database\Seeder;

class FormaNarizSeeder extends Seeder
{
    public function run(): void
    {
        $tiposNarices = [
            'Aguiñeña',
            'Chata',
            'Recta',
            'No especifica',
        ];

        foreach ($tiposNarices as $tipoNariz) {
            TipoNariz::create([
                'nombre' => $tipoNariz,
            ]);
        }
    }
}
