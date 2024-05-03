<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaFiliacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Catalogos\MediaFiliacion\ColorVellofacial::insert([
            ["nombre" => "Castaño"],
            ["nombre" => "Negro"],
            ["nombre" => "Rubio"],
            ["nombre" => "Pelirrojo"],
            ["nombre" => "Entrecano"],
            ["nombre" => "Canoso"]
        ]);

        \App\Models\Catalogos\MediaFiliacion\CorteVellofacial::insert([
            ["nombre" => "Cerrada"],
            ["nombre" => "Rasurada"],
            ["nombre" => "De candado"],
            ["nombre" => "Depilada"],
            ["nombre" => "Larga"],
        ]);

        \App\Models\Catalogos\MediaFiliacion\RegionVellofacial::insert([
            ["nombre" => "Barba"],
            ["nombre" => "Bigote"],
            ["nombre" => "Patilla"],
        ]);

        \App\Models\Catalogos\MediaFiliacion\VolumenVellofacial::insert([
            ["nombre" => "Poblada"],
            ["nombre" => "Lampiña"],
            ["nombre" => "Escasa"]
        ]);
    }
}
