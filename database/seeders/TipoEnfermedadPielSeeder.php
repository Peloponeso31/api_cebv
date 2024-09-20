<?php

namespace Database\Seeders;

use App\Models\TipoEnfermedadPiel;
use Illuminate\Database\Seeder;

class TipoEnfermedadPielSeeder extends Seeder
{
    public function run(): void
    {
        $enfermedadesPieles = [
            'DERMATITIS',
            'HERPES',
            'PSORIASIS',
            'ONICOMICOSIS',
            'OTRA'
        ];

        foreach ($enfermedadesPieles as $enfermedadPiel) {
            TipoEnfermedadPiel::create([
                'nombre' => $enfermedadPiel,
            ]);
        }
    }
}
