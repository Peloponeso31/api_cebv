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
            ->hasHipotesis(3)
            ->hasDesaparecidos(3)
            ->hasReportantes(2)
            ->count(6)
            ->create();

        Reporte::factory()
            ->hasHechosDesapariciones()
            ->hasHipotesis()
            ->hasDesaparecidos(6)
            ->hasReportantes(1)
            ->count(6)
            ->create();

        Reporte::factory()
            ->hasHechosDesapariciones()
            ->hasHipotesis(2)
            ->hasDesaparecidos()
            ->hasReportantes()
            ->count(6)
            ->create();
    }
}
