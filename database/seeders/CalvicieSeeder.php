<?php

namespace Database\Seeders;

use App\Models\Calvicie;
use Illuminate\Database\Seeder;

class CalvicieSeeder extends Seeder
{
    public function run(): void
    {
        $calvicies = [
            'No',
            'Bilateral',
            'Coronal',
            'Frontal',
            'Fronto coronal',
            'Total',
            'No especifica',
            'Inicipiente',
            'Tonsural'
        ];

        sort($calvicies);

        foreach ($calvicies as $calvicie) {
            Calvicie::create([
                'nombre' => $calvicie
            ]);
        }
    }
}
