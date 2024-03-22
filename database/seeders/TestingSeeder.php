<?php

namespace Database\Seeders;

use App\Models\Reportes\Reporte;
use Illuminate\Database\Seeder;

class TestingSeeder extends Seeder
{
    public function run(): void
    {
        Reporte::factory()
            ->hasDesaparecidos(1)
            ->hasReportantes(1)
            ->count(2)
            ->create();
    }
}
