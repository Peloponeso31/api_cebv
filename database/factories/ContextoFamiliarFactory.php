<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContextoFamiliar>
 */
class ContextoFamiliarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "personas_vive" => fake()-> name(),
            "hijos" => fake()->boolean(60) ? fake()->numberBetween(0, 6) : null,
            "familiar_cercano" => fake()-> name(),
            "familiar_violencia" => fake()-> name(),
            
            "persona_id" => fake()->numberBetween(0, 1000),
        ];
    }
}
