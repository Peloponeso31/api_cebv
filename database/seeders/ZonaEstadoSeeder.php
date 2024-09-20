<?php

namespace Database\Seeders;

use App\Models\Ubicaciones\ZonaEstado;
use Illuminate\Database\Seeder;

class ZonaEstadoSeeder extends Seeder
{
    public function run(): void
    {
        $zonasEstados = [
            ['nombre' => 'Norte', 'abreviatura' => 'ZN'],
            ['nombre' => 'Centro', 'abreviatura' => 'ZC'],
            ['nombre' => 'Sur', 'abreviatura' => 'ZS'],
            ['nombre' => 'No aplica', 'abreviatura' => 'ZZ'],
        ];

        foreach ($zonasEstados as $zonaEstado) {
            ZonaEstado::create($zonaEstado);
        }
    }
}
