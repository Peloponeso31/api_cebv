<?php

namespace Database\Seeders\MunicipioSeeders;

use App\Models\Municipio;
use Illuminate\Database\Seeder;

class VeracruzSeeder extends Seeder
{
    public function run(): void
    {
        $municipios = [
            'coatepec',
            'xalapa',
            'veracruz',
        ];

        foreach ($municipios as $municipio) {
            Municipio::firstOrCreate([
                'estado_id' => 30,
                'nombre' => $municipio
            ]);
        }
    }

}
