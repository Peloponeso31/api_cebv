<?php

namespace Database\Seeders;

use App\Models\FormaCara;
use Illuminate\Database\Seeder;

class FormaCaraSeeder extends Seeder
{
    public function run(): void
    {
        $formasCaras = [
            'Alargada',
            'Cuadrada',
            'Diamante',
            'Ovalada',
            'Redonda',
            'Rectangular',
            'Triangular',
            'No especifica',
        ];

        foreach ($formasCaras as $formaCara) {
            FormaCara::create([
                'nombre' => $formaCara,
            ]);
        }
    }
}
