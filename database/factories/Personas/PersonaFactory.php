<?php

namespace Database\Factories\Personas;

use App\Models\Ubicaciones\Estado;
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
        $generos = [
            "Mujer cisgénero",
            "Hombre cisgénero",
            "Mujer transgénero",
            "Hombre transgénero",
            "Persona no binaria",
            "Género fluido",
            "Género queer",
            "Agénero",
            "Bigénero",
            "Trigénero",
            "Pangénero",
            "Neutrois",
            "Género agénero",
            "Demigénero",
            "Androgino",
            "Transmasculino",
            "Transfemenino",
            "Género no conforme",
            "Genderqueer",
            "Two-Spirit",
        ];

        $hombre = [
            'lugar_nacimiento_id' => Estado::inRandomOrder()->first()->id,
            'nombre' => fake()->firstNameMale(),
            'apellido_paterno' => fake()->lastName(),
            'apellido_materno' => fake()->boolean(90) ? fake()->lastName() : null,
            'pseudonimo_nombre' => fake()->firstNameMale(),
            'pseudonimo_apellido_paterno' => fake()->lastName(),
            'pseudonimo_apellido_materno' => fake()->boolean(90) ? fake()->lastName() : null,
            'fecha_nacimiento' => fake()->date(),
            'ocupacion' => fake()->jobTitle(),
            'curp' => 'CURP' . Str::random(13),
            'observaciones_curp' => fake()->paragraph(),
            'rfc' => 'RFC' . Str::random(10),
            'sexo' => 'H',
            'genero' => fake()->boolean(95) ? 'Heterosexual' : fake()->randomElement($generos)
        ];

        $mujer = [
            'lugar_nacimiento_id' => Estado::inRandomOrder()->first()->id,
            'nombre' => fake()->firstNameFemale(),
            'apellido_paterno' => fake()->lastName(),
            'apellido_materno' => fake()->boolean(90) ? fake()->lastName() : null,
            'pseudonimo_nombre' => fake()->firstNameFemale(),
            'pseudonimo_apellido_paterno' => fake()->lastName(),
            'pseudonimo_apellido_materno' => fake()->boolean(90) ? fake()->lastName() : null,
            'fecha_nacimiento' => fake()->date(),
            'ocupacion' => fake()->jobTitle(),
            'curp' => 'CURP' . Str::random(13),
            'observaciones_curp' => fake()->paragraph(1),
            'rfc' => 'RFC' . Str::random(10),
            'sexo' => 'M',
            'genero' => fake()->boolean(95) ? 'Heterosexual' : fake()->randomElement($generos)
        ];

        if (fake()->boolean()) return $hombre;

        return $mujer;
    }
}
