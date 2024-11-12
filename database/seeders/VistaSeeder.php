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
            ["nombre" => "DORSAL", 'color' => '662D91'],
            ["nombre" => "FRONTAL", 'color' => 'F26522'],
            ["nombre" => "NO ESPECIFICA"],
        ];

        foreach ($vistas as $vista) {
            Vista::firstOrCreate($vista);
        }
    }
}
