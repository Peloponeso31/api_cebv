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
            'asentamiento_id' => Asentamiento::inRandomOrder()->first()->id,
            'calle' => fake()->streetName,
            'numero_exterior' => fake()->buildingNumber,
            'numero_interior' => fake()->buildingNumber,
            'calle_1' => fake()->streetName,
            'calle_2' => fake()->streetName,
            'descripcion' => fake()->sentence,
        ];
    }
}
