<?php

namespace Database\Factories\Ubicaciones;

use App\Models\Ubicaciones\Asentamiento;
use App\Models\Ubicaciones\Direccion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DireccionFactory extends Factory
{
    protected $model = Direccion::class;

    public function definition(): array
    {
        return [
            'calle' => $this->faker->streetAddress(),
            'colonia' => $this->faker->streetName(),
            'numero_exterior' => $this->faker->buildingNumber(),
            'numero_interior' => $this->faker->buildingNumber(),
            'calle_1' => $this->faker->streetName(),
            'calle_2' => $this->faker->streetName(),
            'tramo_carretero' => $this->faker->word(),
            'referencia' => $this->faker->text(),
            'fecha_creacion' => Carbon::now(),
            'fecha_actualizacion' => Carbon::now(),

            'asentamiento_id' => Asentamiento::inRandomOrder()->first()->id,
        ];
    }
}
