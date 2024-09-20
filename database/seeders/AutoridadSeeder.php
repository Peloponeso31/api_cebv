<?php

namespace Database\Seeders;

use App\Models\Autoridad;
use Illuminate\Database\Seeder;

class AutoridadSeeder extends Seeder
{
    public function run(): void
    {
        $autoridades = [
            "POLICIA MUNICIPAL",
            "POLICIA ESTATAL",
            "POLICIA MINISTERIAL FGE/PGE",
            "POLICIA MINISTERIAL FGR/PGR",
            "POLICIA NAVAL",
            "POLICIA FEDERAL",
            "POLICIA (SIN CORPORACION)",
            "FUERZA CIVIL",
            "GUARDIA NACIONAL",
            "EJERCITO",
            "MARINA",
            "AGENTE MIGRATORIO",
            "SERVIDOR PUBLICO",
            "OTRA"
        ];

        foreach ($autoridades as $autoridad) {
            Autoridad::create([
                'nombre' => $autoridad,
            ]);
        }
    }
}
