<?php

namespace Database\Seeders;

use App\Models\Reportes\TipoReporte;
use Illuminate\Database\Seeder;

class TipoReporteSeeder extends Seeder
{
    public function run(): void
    {
        $tiposReportes= [
            ['nombre' => 'Solicitud de busqueda', 'abreviatura' => 'SB'],
            ['nombre' => 'Carpetas de investigación', 'abreviatura' => 'CI'],
            ['nombre' => 'Solicitud de búsqueda de familiares', 'abreviatura' => 'SBF'],
            ['nombre' => 'Solicitud de colaboración', 'abreviatura' => 'SC'],
            ['nombre' => 'Solicitud de difusión', 'abreviatura' => 'SD'],
            ['nombre' => 'Investigación ministerial', 'abreviatura' => 'IM'],
        ];

        sort($tiposReportes);

        foreach ($tiposReportes as $tipoReporte) {
            TipoReporte::firstOrCreate($tipoReporte);
        }
    }
}
