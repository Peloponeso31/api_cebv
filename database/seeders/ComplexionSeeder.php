<?php

namespace Database\Seeders;

use App\Models\Catalogos\CaracteristicasFisicas\Complexion;
use Illuminate\Database\Seeder;

class ComplexionSeeder extends Seeder
{
    public function run(): void
    {
        $complexiones = [
            'Atlética',
            'Delgada',
            'Obesa',
            'Regular',
            'Robusta',
            'No especifica',
        ];

        foreach ($complexiones as $complexion) {
            Complexion::create([
                'nombre' => $complexion,
            ]);
        }
    }
}
