<?php

namespace Database\Factories\Reportes\Relaciones;

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
            'habla_espanhol' => $this->faker->boolean,
            'sabe_leer' => $this->faker->boolean,
            'sabe_escribir' => $this->faker->boolean,
            'url_boletin' => $this->faker->url,
        ];
    }
}
