<?php

namespace Database\Seeders;

use App\Models\IntervencionQuirurgica;
use Illuminate\Database\Seeder;

class IntervencionQuirurgicaSeeder extends Seeder
{
    public function run(): void
    {
        $intervencionesQuirurgicas = [
            'Apéndice',
            'Cesárea',
            'Vesícula',
            'Hernia',
            'Corazón',
            'Histerectomía',
            'Otra'
        ];

        foreach ($intervencionesQuirurgicas as $intervencionQuirurgica) {
            IntervencionQuirurgica::create([
                'nombre' => $intervencionQuirurgica,
            ]);
        }
    }
}
