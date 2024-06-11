<?php

namespace Database\Seeders;

use App\Models\Catalogos\CaracteristicasFisicas\TamanoOjos;
use Illuminate\Database\Seeder;

class TamanoOjoSeeder extends Seeder
{
    public function run(): void
    {
        $tamanosOjos = [
            'Grandes',
            'Medianos',
            'Pequeños',
            'No especifica',
        ];

        foreach ($tamanosOjos as $tamanoOjo) {
            TamanoOjos::create([
                'nombre' => $tamanoOjo,
            ]);
        }
    }
}
