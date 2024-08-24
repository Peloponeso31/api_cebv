<?php

namespace Database\Seeders;

use App\Models\EstatusEscolaridad;
use Illuminate\Database\Seeder;

class EstatusEscolaridadSeeder extends Seeder
{
    public function run(): void
    {
        $estatusEscolaridades = [
            'TERMINADA',
            'EN CURSO',
            'NO ESPECIFICA',
        ];

        foreach ($estatusEscolaridades as $estatusEscolaridad) {
            EstatusEscolaridad::create([
                'nombre' => $estatusEscolaridad,
            ]);
        }
    }
}
