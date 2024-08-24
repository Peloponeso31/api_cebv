<?php

namespace Database\Seeders;

use App\Models\Particular;
use Illuminate\Database\Seeder;

class ParticularSeeder extends Seeder
{
    public function run(): void
    {
        $particulares = [
            'AMISTAD',
            'CONOCIDO',
            'PAREJA SENTIMENTAL',
            'FAMILIAR',
            'UNO(S) INTEGRANTE(S) DE LA DELINCUENCIA ORGANIZADA',
            'DESCONOCIDO',
            'OTRO',
        ];

        foreach ($particulares as $particular) {
            Particular::create([
                'nombre' => $particular,
            ]);
        }
    }
}
