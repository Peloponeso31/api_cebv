<?php

namespace Database\Factories\Personas;

use App\Models\Genero;
use App\Models\Sexo;
use App\Models\Ubicaciones\Estado;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Hoa\File\Read;
use Hoa\Compiler\Llk\Llk;
use Hoa\Regex\Visitor\Isotropic;
use Hoa\Math\Sampler\Random;

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
        $grammar  = new Read('hoa://Library/Regex/Grammar.pp');
        $compiler = Llk::load($grammar);
        $ast      = $compiler->parse('^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$');
        $generator = new Isotropic(new Random());

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
            'curp' =>  $generator->visit($ast),
            'observaciones_curp' => fake()->paragraph(),
            'rfc' => 'RFC' . Str::random(10),
            'sexo_id' => Sexo::inRandomOrder()->first()->id,
            'genero_id' => fake()->boolean(95) ? 1 : fake()->randomElement([3, 4])
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
            'curp' =>  $generator->visit($ast),
            'observaciones_curp' => fake()->paragraph(1),
            'rfc' => 'RFC' . Str::random(10),
            'sexo_id' => Sexo::inRandomOrder()->first()->id,
            'genero_id' => fake()->boolean(95) ? 2 : fake()->randomElement([3, 4])
        ];

        if (fake()->boolean()) return $hombre;

        return $mujer;
    }
}
