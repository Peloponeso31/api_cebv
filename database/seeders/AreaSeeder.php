<?php

namespace Database\Seeders;

use App\Models\Oficialidades\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        // No mover el orden de las áreas, por lo menos de la última área.
        $areas = [
            'Celula Norte',
            'Celula Centro',
            'Celula Sur',
            'Larga Data',
            'DVIAJ', // Se entiende que esta área tendrá el ID 5
        ];

        foreach ($areas as $area) {
            Area::firstOrCreate(['nombre' => $area]);
        }
    }
}
