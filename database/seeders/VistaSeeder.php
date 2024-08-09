<?php

namespace Database\Seeders;

use App\Models\Catalogos\Vista;
use App\Models\Catalogos\VistaRnpdno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vistas = [
            ["nombre" => "DORSAL"],
            ["nombre" => "FRONTAL"],
            ["nombre" => "NO ESPECIFICA"],
            ["nombre" => "INTERNO"],
            ["nombre" => "EXTERNO"],
        ];

        $vistas_rnpdno = [
            ["nombre" => "DORSAL"],
            ["nombre" => "FRONTAL"],
            ["nombre" => "NO ESPECIFICA"],
        ];

        foreach ($vistas as $vista) {
            Vista::firstOrCreate($vista);
        }

        foreach ($vistas_rnpdno as $vista_rnpdno) {
            VistaRnpdno::firstOrCreate($vista_rnpdno);
        }
    }
}
