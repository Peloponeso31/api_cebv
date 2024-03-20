<?php

namespace Database\Seeders;

use App\Models\Oficialidades\Institucion;
use Illuminate\Database\Seeder;

class InstitucionSeeder extends Seeder
{
    public function run(): void
    {
        $instituciones = [
            'Comisión Nacional de Derechos Humanos',
            'Instituto Nacional de Migración',
            'Comisión Nacional de Búsqueda de Personas',
            'Fiscalía General de la República',
            'Fiscalía General del Estado',
            'Comisión Estatal de Bpúsqueda de Personas de Veracruz',
        ];

        sort($instituciones);

        foreach ($instituciones as $institucion) {
            Institucion::create(['nombre' => $institucion]);
        }
    }
}
