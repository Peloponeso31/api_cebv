<?php

namespace Database\Seeders;

use App\Models\Catalogos\CaracteristicasFisicas\ColorPiel;
use Illuminate\Database\Seeder;

class ColorPielSeeder extends Seeder
{
    public function run(): void
    {
        $coloresPieles = [
            'Albina',
            'Amarilla',
            'Blanca',
            'Morena',
            'Morena clara',
            'Morena oscura',
            'Negra',
            'No especifica',
        ];

        foreach ($coloresPieles as $colorPiel) {
            ColorPiel::create([
                'nombre' => $colorPiel,
            ]);
        }
    }
}
