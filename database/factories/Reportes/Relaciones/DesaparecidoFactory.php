<?php

namespace Database\Factories\Reportes\Relaciones;

use App\Models\Personas\EstatusPersona;
use App\Models\Personas\Persona;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Factories\Factory;

class DesaparecidoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'persona_id' => Persona::inRandomOrder()->first()->id,
            'reporte_id' => Reporte::inRandomOrder()->first()->id,
            'estatus_rpdno_id' => EstatusPersona::inRandomOrder()->first()->id,
            'estatus_cebv_id' => EstatusPersona::inRandomOrder()->first()->id,
            'habla_espanhol' => fake()->boolean,
            'sabe_leer' => fake()->boolean,
            'sabe_escribir' => fake()->boolean,
            'url_boletin' => fake()->url,
        ];
    }
}
