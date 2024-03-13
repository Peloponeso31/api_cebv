<?php

namespace Database\Seeders;

use App\Models\Reportes\TipoReporte;
use Illuminate\Database\Seeder;

class TipoReporteSeeder extends Seeder
{
    public function run(): void
    {
        $tiposReportes= [
            'Solicitud de búsqueda',
            'Carpetas de investigación',
            'Solicitud de búsqueda de familiares',
            'Solicitud de colaboración',
            'Solicitud de difusión',
            'Investigación ministerial',
        ];

        sort($tiposReportes);

        foreach ($tiposReportes as $tipoReporte) {
            TipoReporte::firstOrCreate([
                'nombre' => $tipoReporte
            ]);
        }
    }
}
