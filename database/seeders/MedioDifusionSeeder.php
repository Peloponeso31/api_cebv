<?php

namespace Database\Seeders;

use App\Models\MedioDifusion;
use Illuminate\Database\Seeder;

class MedioDifusionSeeder extends Seeder
{
    public function run(): void
    {
        $medios = [
            'BOLETÍN', // Es importante que sea el primero, para la generación de documentos, se ocupa id = 1
            'FICHA DE USO INTERNO',
            'FICHA DE MEDIA FILIACIÓN',
        ];

        foreach ($medios as $medio) {
            MedioDifusion::create([
                'nombre' => $medio
            ]);
        }
    }
}
