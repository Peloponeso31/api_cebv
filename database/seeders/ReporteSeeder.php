<?php

namespace Database\Seeders;

use App\Models\Reportes\Reporte;
use Illuminate\Database\Seeder;

class ReporteSeeder extends Seeder
{
    public function run(): void
    {
        Reporte::factory()
            ->hasHechosDesapariciones()
            ->hasHipotesis()
            ->hasDesaparecidos(3)
            ->hasReportantes(2)
            ->count(6)
            ->create();

    }
}
