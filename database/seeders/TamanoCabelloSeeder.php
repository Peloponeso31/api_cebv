<?php

namespace Database\Seeders;

use App\Models\TamanoCabello;
use Illuminate\Database\Seeder;

class TamanoCabelloSeeder extends Seeder
{
    public function run(): void
    {
        $tamanosCabellos = [
            'Corto',
            'Mediano (Al hombro)',
            'Largo',
            'Rapado',
            'No especifica'
        ];

        foreach ($tamanosCabellos as $tamanoCabello) {
            TamanoCabello::create([
                'nombre' => $tamanoCabello,
            ]);
        }
    }
}
