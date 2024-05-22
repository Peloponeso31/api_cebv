<?php

namespace Database\Factories;

use App\Models\CompaniaTelefonica;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Telefonos>
 */
class TelefonoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'persona_id' => Persona::inRandomOrder()->first()->id,
            "observaciones" => fake()->text(),
            "numero" => fake()->phoneNumber(),
            "compania_id" => CompaniaTelefonica::inRandomOrder()->first()->id,
        ];

    }
}
