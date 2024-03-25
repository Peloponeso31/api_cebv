<?php

namespace Database\Seeders;

use App\Models\Reportes\Reporte;
use Illuminate\Database\Seeder;

class ReporteSeeder extends Seeder
{
    public function run(): void
    {
        Reporte::factory()
            ->hasDesaparecidos(40)
            ->hasReportantes(5)
            ->count(20)
            ->create();

        Reporte::factory()
            ->hasDesaparecidos(3)
            ->hasReportantes(2)
            ->count(20)
            ->create();

        Reporte::factory()
            ->hasDesaparecidos(1)
            ->hasReportantes(1)
            ->count(20)
            ->create();

        Reporte::factory()
            ->hasDesaparecidos(3)
            ->hasReportantes(5)
            ->count(20)
            ->create();
    }
}
