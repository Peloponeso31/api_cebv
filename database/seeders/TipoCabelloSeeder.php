<?php

namespace Database\Seeders;

use App\Models\Catalogos\CaracteristicasFisicas\TipoCabello;
use Illuminate\Database\Seeder;

class TipoCabelloSeeder extends Seeder
{
    public function run(): void
    {
        $tiposCabellos = [
            'Afro',
            'Chino',
            'Crespo',
            'Lacio',
            'Ondulado',
            'Rizado',
            'SemiOndulado',
            'No específica',
        ];

        sort($tiposCabellos);

        foreach ($tiposCabellos as $tipoCabello) {
            TipoCabello::create([
                'nombre' => $tipoCabello,
            ]);
        }
    }
}
