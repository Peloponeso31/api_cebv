<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContextoSocial>
 */
class ContextoSocialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "pasatiempos" => fake()->text(),
            "club_organizacion" => fake()->company(),
            "estudio" => fake()->randomElement(['Sí', 'No']),
            "amistades" => fake()->name(),
            "amistades_municipio" => fake()->name(),
            "correo_electronico" => fake()->email(),
            "nombre_redes_sociales" => fake()->name(),
            "lugares_frecuentes" => fake()->country(),
            "vivienda_estado" => fake()->randomElement(['Sí', 'No']),

            "persona_id" => fake()->numberBetween(0, 1000)
        ];
    }
}
