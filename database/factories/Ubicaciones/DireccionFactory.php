<?php

namespace Database\Factories\Ubicaciones;

use App\Models\Ubicaciones\Asentamiento;
use App\Models\Ubicaciones\Direccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class DireccionFactory extends Factory
{
    protected $model = Direccion::class;

    public function definition(): array
    {
        return [
            'calle' => fake()->streetName(),
            'numero_exterior' => fake()->randomDigit(),
            'numero_interior' => fake()->randomDigit(),
            'calle_1' => fake()->streetName(),
            'calle_2' => fake()->streetName(),
            'tramo_carretero' => fake()->randomFloat(2, 5, 100),
            'codigo_postal' => fake()->numberBetween(10000, 99999),
            'referencia' => fake()->paragraph(),

            'asentamiento_id' => Asentamiento::inRandomOrder()->first()->id,
        ];
    }
}
