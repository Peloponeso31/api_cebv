<?php

namespace Database\Seeders;

use App\Models\Reportes\Informacion\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            'Celula Norte',
            'Celula Centro',
            'Celula Sur',
            'Búsqueda Inmediata',
            'Larga Data',
            'OGPI'
        ];

        sort($areas);

        foreach ($areas as $area) {
            Area::firstOrCreate(['nombre' => $area]);
        }
    }
}
