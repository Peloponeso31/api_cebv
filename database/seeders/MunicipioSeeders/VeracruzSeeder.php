<?php

namespace Database\Seeders\MunicipioSeeders;

use App\Models\Estado;
use App\Models\Municipio;
use Illuminate\Database\Seeder;

class VeracruzSeeder extends Seeder
{
    public function run(): void
    {
        $municipios = [
            'Coatepec',
            'Xalapa',
            'Veracruz',
        ];

        $estado = Estado::where('nombre', 'Veracruz de Ignacio de la Llave')->first()->id;

        foreach ($municipios as $municipio) {
            Municipio::firstOrCreate([
                'estado_id' => $estado,
                'nombre' => $municipio
            ]);
        }
    }

}
