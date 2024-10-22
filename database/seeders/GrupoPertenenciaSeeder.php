<?php

namespace Database\Seeders;

use App\Models\GrupoPertenencia;
use Illuminate\Database\Seeder;

class GrupoPertenenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gruposPertencias = [
            'Prendas de vestir',
            'Alhaja',
            'Accesorio de dama y caballero',
            'Otro',
        ];

        foreach ($gruposPertencias as $grupoPertenencia) {
            GrupoPertenencia::create(['nombre' => $grupoPertenencia]);
        }
    }
}
