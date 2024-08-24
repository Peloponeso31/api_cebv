<?php

namespace Database\Seeders;

use App\Models\Oficialidades\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            'Celula Norte',
            'Celula Centro',
            'Celula Sur',
            'Larga Data',
        ];

        foreach ($areas as $area) {
            Area::firstOrCreate(['nombre' => $area]);
        }
    }
}
