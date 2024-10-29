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
            ["nombre" => "IZQUIERDO", "color" => "20409A"],
            ["nombre" => "DERECHO", "color" => "ED1C24"],
            ["nombre" => "NO ESPECIFICA"],
        ];

        foreach ($lados as $lado) {
            Lado::firstOrCreate($lado);
        }
    }
}
