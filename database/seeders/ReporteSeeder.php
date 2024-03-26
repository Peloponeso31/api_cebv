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

        Reporte::factory()
            ->hasHechosDesapariciones()
            ->hasHipotesis()
            ->hasDesaparecidos()
            ->hasReportantes(3)
            ->count(5)
            ->create();

        Reporte::factory()
            ->count(2)
            ->create();
    }
}
