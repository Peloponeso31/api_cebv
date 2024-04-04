<?php

namespace Database\Factories\Contextos;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;


class ContextoFamiliarFactory extends Factory
{

    public function definition(): array
    {
        return [
            'persona_id' => Persona::factory(),
            "personas_vive" => fake()-> name(),
            "hijos" => fake()->boolean(60) ? fake()->numberBetween(0, 6) : null,
            "familiar_cercano" => fake()-> name(),
            "familiar_violencia" => fake()-> name(),
            
        ];
    }
}
