<?php

namespace Database\Seeders;

use App\Models\SituacionMigratoria;
use Illuminate\Database\Seeder;

class SituacionMigratoriaSeeder extends Seeder
{
    public function run(): void
    {
        $situacionesMigratorias = [
            'Visitante',
            'Residente temporal',
            'Residente permanente',
            'Refugiado',
            'Proceso de regularización migratoria',
            'No tiene estatus migratorio'
        ];

        foreach ($situacionesMigratorias as $situacionMigratoria) {
            SituacionMigratoria::create([
                'nombre' => $situacionMigratoria,
            ]);
        }
    }
}
