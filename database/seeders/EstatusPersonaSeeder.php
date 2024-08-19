<?php

namespace Database\Seeders;

use App\Models\Personas\EstatusPersona;
use Illuminate\Database\Seeder;

class EstatusPersonaSeeder extends Seeder
{
    public function run(): void
    {
        $estatusPersonas = [
            ['nombre' => 'Desaparecida', 'abreviatura' => 'DP'],
            ['nombre' => 'No localizada', 'abreviatura' => 'NL'],
            ['nombre' => 'Localizada con vida', 'abreviatura' => 'LCV'],
            ['nombre' => 'Localizada sin vida', 'abreviatura' => 'LSV'],
        ];

        sort($estatusPersonas);

        foreach ($estatusPersonas as $estatus) {
            EstatusPersona::firstOrCreate($estatus);
        }
    }
}
