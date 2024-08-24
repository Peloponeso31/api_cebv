<?php

namespace Database\Seeders;

use App\Models\FormaOreja;
use Illuminate\Database\Seeder;

class FormaOrejaSeeder extends Seeder
{
    public function run(): void
    {
        $formasOrejas = [
            'CUADRADAS',
            'OVALADAS',
            'REDONDAS',
            'TRIANGULARES',
            'NO ESPECIFICA'
        ];

        foreach ($formasOrejas as $formaOreja) {
            FormaOreja::create([
                'nombre' => $formaOreja,
            ]);
        }
    }
}
