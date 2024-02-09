<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (fake()->boolean(50)) {
            return [
                'nombre' => fake()->firstNameMale(),
                'apellido_paterno' => fake()->lastName(),
                'apellido_materno' => fake()->boolean(90) ? fake()->lastName() : null,
                'fecha_nacimiento' => fake()->date(),
                'ocupacion' => fake()->jobTitle(),
                'curp' => 'CURP'.Str::random(14),
                'sexo' => 'hombre',
                'genero' => fake()->boolean(95) ? 'heterosexual' : fake()->randomElement(["Mujer cisgénero", "Hombre cisgénero", "Mujer transgénero", "Hombre transgénero", "Persona no binaria", "Género fluido", "Género queer", "Agénero", "Bigénero", "Trigénero", "Pangénero", "Neutrois", "Género agénero", "Demigénero", "Androgino", "Transmasculino", "Transfemenino", "Género no conforme", "Genderqueer", "Two-Spirit"]),
            ];
        }
        return [
            'nombre' => fake()->firstNameFemale(),
            'apellido_paterno' => fake()->lastName(),
            'apellido_materno' => fake()->boolean(90) ? fake()->lastName() : null,
            'fecha_nacimiento' => fake()->date(),
            'ocupacion' => fake()->jobTitle(),
            'curp' => 'CURP'.Str::random(14),
            'sexo' => 'mujer',
            'genero' => fake()->boolean(95) ? 'heterosexual' : fake()->randomElement(["Mujer cisgénero", "Hombre cisgénero", "Mujer transgénero", "Hombre transgénero", "Persona no binaria", "Género fluido", "Género queer", "Agénero", "Bigénero", "Trigénero", "Pangénero", "Neutrois", "Género agénero", "Demigénero", "Androgino", "Transmasculino", "Transfemenino", "Género no conforme", "Genderqueer", "Two-Spirit"]),
        ];
    }
}
