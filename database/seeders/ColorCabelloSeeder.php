<?php

namespace Database\Seeders;

use App\Models\Catalogos\CaracteristicasFisicas\ColorCabello;
use Illuminate\Database\Seeder;

class ColorCabelloSeeder extends Seeder
{
    public function run(): void
    {
        $coloresCabellos = [
            'Albino',
            'Cano',
            'Castaño claro',
            'Castaño oscuro',
            'Entrecano',
            'Negro',
            'Pelirrojo',
            'Rubio',
            'Teñido',
            'No especifica'
        ];

        foreach ($coloresCabellos as $colorCabello) {
            ColorCabello::create([
                'nombre' => $colorCabello
            ]);
        }
    }
}
