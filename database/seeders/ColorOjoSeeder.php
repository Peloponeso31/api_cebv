<?php

namespace Database\Seeders;

use App\Models\Catalogos\CaracteristicasFisicas\ColorOjos;
use Illuminate\Database\Seeder;

class ColorOjoSeeder extends Seeder
{
    public function run(): void
    {
        $coloresOjos = [
            'Azules',
            'Cafés claros',
            'Cafés oscuros',
            'Grises',
            'Miel o ámbar',
            'Negros',
            'Verdes',
            'No específica'
        ];

        foreach ($coloresOjos as $colorOjo) {
            ColorOjos::create([
                'nombre' => $colorOjo
            ]);
        }
    }
}
