<?php

namespace Database\Seeders;

use App\Models\EnfermedadPiel;
use Illuminate\Database\Seeder;

class EnfermedadPielSeeder extends Seeder
{
    public function run(): void
    {
        $enfermedadesPieles = [
            'Dermatitis',
            'Herpes',
            'Psoriasis',
            'Onicomicosis',
            'Otra'
        ];

        foreach ($enfermedadesPieles as $enfermedadPiel) {
            EnfermedadPiel::create([
                'nombre' => $enfermedadPiel,
            ]);
        }
    }
}
