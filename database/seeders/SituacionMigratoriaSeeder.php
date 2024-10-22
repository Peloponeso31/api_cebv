<?php

namespace Database\Seeders;

use App\Models\SituacionMigratoria;
use Illuminate\Database\Seeder;

class SituacionMigratoriaSeeder extends Seeder
{
    public function run(): void
    {
        $situacionesMigratorias = [
            'VISITANTE',
            'RESIDENTE TEMPORAL',
            'RESIDENTE PERMANENTE',
            'REFUGIADO',
            'PROCESO DE REGULARIZACIÓN MIGRATORIA',
            'NO TIENE ESTATUS MIGRATORIO',
        ];

        foreach ($situacionesMigratorias as $situacionMigratoria) {
            SituacionMigratoria::create([
                'nombre' => $situacionMigratoria,
            ]);
        }
    }
}
