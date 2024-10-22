<?php

namespace Database\Seeders;

use App\Models\GrupoVulnerable;
use Illuminate\Database\Seeder;

class GrupoVulnerableSeeder extends Seeder
{
    public function run(): void
    {
        $gruposVulnerables = [
            'Adulto mayor',
            'Discapacidad',
            'Embarazo',
            'Infancia',
            'LGBTQ+',
            'Migrante',
            'Población afrodescendiente',
            'Población indígena',
            'Población refugiada',
            'Población víctima de violencia sexual',
            'Población víctima del conflicto armado',
        ];

        foreach ($gruposVulnerables as $grupoVulnerable) {
            GrupoVulnerable::create([
                'nombre' => $grupoVulnerable,
            ]);
        }
    }
}
