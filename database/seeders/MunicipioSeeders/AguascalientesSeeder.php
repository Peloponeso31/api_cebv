<?php

namespace Database\Seeders\MunicipioSeeders;

use App\Models\Ubicaciones\Estado;
use App\Models\Ubicaciones\Municipio;
use Illuminate\Database\Seeder;

class AguascalientesSeeder extends Seeder
{
    public function run(): void
    {
        $municipios = [
            'Aguascalientes',
            'Asientos',
            'Calvillo',
            'Cosío',
            'Jesús María',
            'Pabellón de Arteaga',
            'Rincón de Romos',
            'San José de Gracia',
            'Tepezalá',
            'El Llano',
            'San Francisco de los Romo'
        ];

        $estado = Estado::where('nombre', 'Aguascalientes')->first()->id;

        foreach ($municipios as $municipio) {
            Municipio::firstOrCreate([
                'estado_id' => $estado,
                'nombre' => $municipio
            ]);
        }
    }
}
