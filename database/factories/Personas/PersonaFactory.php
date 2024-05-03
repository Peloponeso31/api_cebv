<?php

namespace Database\Factories\Personas;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personas\Persona>
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
                'sexo_al_nacer' => 'Hombre',
                'genero' => fake()->boolean(95) ? 'Heterosexual' : fake()->randomElement(["Mujer cisgénero", "Hombre cisgénero", "Mujer transgénero", "Hombre transgénero", "Persona no binaria", "Género fluido", "Género queer", "Agénero", "Bigénero", "Trigénero", "Pangénero", "Neutrois", "Género agénero", "Demigénero", "Androgino", "Transmasculino", "Transfemenino", "Género no conforme", "Genderqueer", "Two-Spirit"]),
                'estatura' => number_format(fake()->randomFloat(2, 0, 3), 2),
                'peso' => number_format(fake()->randomFloat(2, 0, 200), 2),

            ];
        }
        return [
            'nombre' => fake()->firstNameFemale(),
            'apellido_paterno' => fake()->lastName(),
            'apellido_materno' => fake()->boolean(90) ? fake()->lastName() : null,
            'fecha_nacimiento' => fake()->date(),
            'ocupacion' => fake()->jobTitle(),
            'curp' => 'CURP'.Str::random(14),
            'sexo_al_nacer' => 'Mujer',
            'genero' => fake()->boolean(95) ? 'Heterosexual' : fake()->randomElement(["Mujer cisgénero", "Hombre cisgénero", "Mujer transgénero", "Hombre transgénero", "Persona no binaria", "Género fluido", "Género queer", "Agénero", "Bigénero", "Trigénero", "Pangénero", "Neutrois", "Género agénero", "Demigénero", "Androgino", "Transmasculino", "Transfemenino", "Género no conforme", "Genderqueer", "Two-Spirit"]),
            'estatura' => number_format(fake()->randomFloat(2, 0, 3), 2),
            'peso' => number_format(fake()->randomFloat(2, 0, 200), 2),
        ];
    }
}
