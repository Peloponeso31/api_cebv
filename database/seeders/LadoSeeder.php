<?php

namespace Database\Seeders;

use App\Models\Catalogos\Lado;
use App\Models\Catalogos\LadoRnpdno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lados = [
            ["nombre" => "DERECHO", "color" => "E63244"],
            ["nombre" => "IZQUIERDO", "color" => "ED1C24"],
            ["nombre" => "NO ESPECIFICA", "color" => "6C7156"],
            ["nombre" => "UNICO", "color" => "000000"],
            ["nombre" => "ANTERIOR", "color" => "FF7F27"],
            ["nombre" => "POSTERIOR", "color" => "FFF200"],
        ];

        $lados_rnpdno = [
            ["nomladorpndno" => "DERECHO"],
            ["nomladorpndno" => "IZQUIERDO"],
            ["nomladorpndno" => "NO ESPECIFICA"],
            ["nomladorpndno" => "UNICO"],
        ];


        foreach ($lados as $lado) {
            Lado::firstOrCreate($lado);
        }

        foreach ($lados_rnpdno as $lado_rnpdno) {
            LadoRnpdno::firstOrCreate($lado_rnpdno);
        }
    }
}
