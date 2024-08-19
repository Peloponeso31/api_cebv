<?php

namespace Database\Seeders;

use App\Models\Reportes\Reporte;
use Illuminate\Database\Seeder;

class ReporteSeeder extends Seeder
{
    public function run(): void
    {
        Reporte::factory()
            ->count(4)
            ->hasReportantes()
            ->hasDesaparecidos()
            ->create();

        Reporte::factory()
            ->count(3)
            ->hasReportantes()
            ->hasDesaparecidos(2)
            ->create();

        Reporte::factory()
            ->count(4)
            ->hasReportantes()
            ->hasDesaparecidos(4)
            ->create();

        Reporte::factory()
            ->count(50)
            ->hasReportantes()
            ->hasDesaparecidos()
            ->create();
    }
}
