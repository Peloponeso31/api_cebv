<?php

namespace Database\Seeders;

use App\Models\TamanoBoca;
use Illuminate\Database\Seeder;

class TamanoBocaSeeder extends Seeder
{
    public function run(): void
    {
        $tamanosBocas = [
            'Chica',
            'Mediana',
            'Grande',
            'No especifica'
        ];

        foreach ($tamanosBocas as $tamanoBoca) {
            TamanoBoca::create([
                'nombre' => $tamanoBoca,
            ]);
        }
    }
}
