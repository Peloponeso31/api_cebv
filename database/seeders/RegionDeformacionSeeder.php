<?php

namespace Database\Seeders;

use App\Models\RegionDeformacion;
use Illuminate\Database\Seeder;

class RegionDeformacionSeeder extends Seeder
{
    public function run(): void
    {
        $regionesDeformaciones = [
            'Cabeza',
            'Cuello',
            'Torso',
            'Extremidades superiores',
            'Extremidades inferiores',
            'Región genital',
            'Manos',
            'Pies',
            'Otra',
        ];

        foreach ($regionesDeformaciones as $regionDeformacion) {
            RegionDeformacion::create([
                'nombre' => $regionDeformacion,
            ]);
        }
    }
}
