<?php

namespace Database\Seeders;

use App\Models\TipoIntervencionQuirurgica;
use Illuminate\Database\Seeder;

class TipoIntervencionQuirurgicaSeeder extends Seeder
{
    public function run(): void
    {
        $tipoIntervencionQuirurgica = [
            'APÉNDICE',
            'CESÁREA',
            'VESÍCULA',
            'HERNIA',
            'CORAZÓN',
            'HISTERECTOMÍA',
            'OTRA',
        ];

        foreach ($tipoIntervencionQuirurgica as $intervencionQuirurgica) {
            TipoIntervencionQuirurgica::create([
                'nombre' => $intervencionQuirurgica,
            ]);
        }
    }
}
