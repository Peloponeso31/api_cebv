<?php

namespace Database\Seeders;

use App\Models\TipoMenton;
use Illuminate\Database\Seeder;

class TipoMentonSeeder extends Seeder
{
    public function run(): void
    {
        $tiposMentones = [
            'Recto',
            'Redondeado',
            'Puntiagudo',
            'Pronunciado',
            'Inclinado',
        ];

        foreach ($tiposMentones as $tipoMenton) {
            TipoMenton::create([
                'nombre' => $tipoMenton,
            ]);
        }
    }
}
