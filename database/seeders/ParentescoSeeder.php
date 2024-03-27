<?php

namespace Database\Seeders;

use App\Models\Personas\Parentesco;
use Illuminate\Database\Seeder;

class ParentescoSeeder extends Seeder
{
    public function run(): void
    {
        // TODO: Change for real data
        $parentescos = [
            'Padre',
            'Madre',
            'Hijo',
            'Hija',
            'Abuelo',
            'Abuela',
            'Nieto',
            'Nieta',
            'Tio',
            'Tia',
            'Sobrino',
            'Sobrina',
            'Primo',
            'Prima',
            'Hermano',
            'Hermana',
            'Esposo',
            'Esposa',
            'Conyuge',
            'Pareja',
            'Amigo',
            'Amiga',
            'Compadre',
            'Comadre',
            'Vecino',
            'Vecina',
            'Conocido',
            'Conocida',
            'Otro',
        ];

        foreach ($parentescos as $parentesco) {
            Parentesco::create([
                'nombre' => $parentesco,
            ]);
        }
    }
}
