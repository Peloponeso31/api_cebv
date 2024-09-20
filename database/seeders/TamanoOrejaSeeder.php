<?php

namespace Database\Seeders;

use App\Models\Catalogos\CaracteristicasFisicas\TamanoOrejas;
use Illuminate\Database\Seeder;

class TamanoOrejaSeeder extends Seeder
{
    public function run(): void
    {
        $tamanosOrejas = [
            'Chicas',
            'Medianas',
            'Grandes',
            'No especifica'
        ];

        foreach ($tamanosOrejas as $tamanoOreja) {
            TamanoOrejas::create([
                'nombre' => $tamanoOreja
            ]);
        }
    }
}
