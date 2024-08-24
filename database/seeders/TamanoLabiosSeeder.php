<?php

namespace Database\Seeders;

use App\Models\Catalogos\CaracteristicasFisicas\TipoLabios;
use Illuminate\Database\Seeder;

class TamanoLabiosSeeder extends Seeder
{
    public function run(): void
    {
        $tamanosLabios = [
            'Delgados',
            'Gruesos',
            'Medianos',
            'Mixtos',
            'No especifica',
        ];

        foreach ($tamanosLabios as $tamanoLabios) {
            TipoLabios::create([
                'nombre' => $tamanoLabios,
            ]);
        }
    }
}
