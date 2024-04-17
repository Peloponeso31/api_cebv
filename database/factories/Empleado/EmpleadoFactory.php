<?php

namespace Database\Factories\Empleado;

use App\Models\Catalogos\Oficina;
use App\Models\Catalogos\Puesto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            "nombre" => fake()->boolean(50) ? fake()->firstNameMale() : fake()->firstNameFemale(),
            "apellido_paterno" => fake()->lastName(),
            "apellido_materno" => fake()->lastName(),
            "fecha_nacimiento" => fake()->date(),
            "puesto_id" => Puesto::inRandomOrder()->first()->id,
            "oficina_id"  => Oficina::inRandomOrder()->first()->id,
        ];
    }
}
