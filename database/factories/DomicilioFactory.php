<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DomicilioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'persona_id' => fake()->numberBetween(1, 100),
            'calle' => fake()->streetName(),
            'numero_interior' => fake()->numberBetween(1, 300),
            'numero_exterior' => fake()->numberBetween(1, 300),
            'km_carretera' => fake()->numberBetween(1, 500),
            'entre_calle_1' => fake()->streetName(),
            'entre_calle_2' => fake()->streetName(),
            'referencia' => fake()->sentence(),
        ];
    }
}
