<?php

namespace Database\Seeders;

use App\Models\Reportes\Reporte;
use Illuminate\Database\Seeder;

class ReporteSeeder extends Seeder
{
    public function run(): void
    {
        Reporte::factory()
            ->count(100)
            ->hasReportantes()
            ->hasDesaparecidos()
            ->create();
    }
}
