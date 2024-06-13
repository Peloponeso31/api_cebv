<?php

namespace Database\Seeders;

use App\Models\Ceja;
use Illuminate\Database\Seeder;

class CejaSeeder extends Seeder
{
    public function run(): void
    {
        $cejas = [
            'Depiladas',
            'Escasas',
            'Pobladas',
            'Rasuradas',
            'Regulares',
            'No especifica'
        ];

        foreach ($cejas as $ceja) {
            Ceja::create([
                'nombre' => $ceja,
            ]);
        }
    }
}
