<?php

namespace Database\Factories\Ubicaciones;

use App\Models\Ubicaciones\Asentamiento;
use App\Models\Ubicaciones\Municipio;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsentamientoFactory extends Factory
{
    protected $model = Asentamiento::class;
    public function definition(): array
    {
        return [
            'municipio_id' => Municipio::inRandomOrder()->first()->id,
            'codigo_postal' => fake()->numberBetween(10000, 99999),
            'nombre' => fake()->city(),
        ];
    }
}
