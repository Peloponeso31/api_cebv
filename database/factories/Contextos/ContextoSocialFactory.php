<?php

namespace Database\Factories\Contextos;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;


class ContextoSocialFactory extends Factory
{

    public function definition(): array
    {
        return [
            'persona_id' => Persona::factory(),
            "pasatiempos" => fake()->text(),
            "club_organizacion" => fake()->company(),
            "estudio" => fake()->randomElement(['Sí', 'No']),
            "amistades" => fake()->name(),
            "amistades_municipio" => fake()->name(),
            "correo_electronico" => fake()->email(),
            "nombre_redes_sociales" => fake()->name(),
            "lugares_frecuentes" => fake()->country(),
            "vivienda_estado" => fake()->randomElement(['Sí', 'No']),
            
        ];
    }
}
