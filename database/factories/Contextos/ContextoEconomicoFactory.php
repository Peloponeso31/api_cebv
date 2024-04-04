<?php

namespace Database\Factories\Contextos;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;


class ContextoEconomicoFactory extends Factory
{

    public function definition(): array
    {
        return [
            'persona_id' => Persona::factory(),
            "empresa"  => fake()-> company(),
            "puesto" => fake()->jobTitle(),
            "fecha_ingreso" => fake()->date(),
            "relacion_colegas" => fake()-> randomElement(['Sí', 'No']),
            "conflictos_trabajo" => fake()->text(),
            "cambiosFinanzas" => fake() -> randomElement(['Sí', 'No']),
            "deudas" => fake()->boolean(60) ? fake()->numberBetween(1000, 100000) : null,
            "actividadesExtralaborales" => fake() -> randomElement(['Sí', 'No']),
            "emprendimientos" => fake() -> randomElement(['Sí', 'No']),
            "saludMental" => fake()->text(),
            "ausenciaPrevia" => fake()-> randomElement(['Sí', 'No']),
            "contactosRelevantes" => fake()->boolean(50) ? fake()-> name() : null,
            "beneficios" => fake()->text(),
            "cambiosBeneficios" => fake()->text(),
            "ultimoContactoTrabajo" => fake()->boolean(30) ? fake()-> name() : null,
            "sindicato" => fake() -> company(),
            "fecha_ingreso_sindicato" => fake()->date(),
            "idSindicato" => fake()->numberBetween(0, 1000),
            "posicionSindicato" => fake() -> jobTitle(),
            "participacion" => fake()-> randomElement(['Sí', 'No']),
            "relacion_sindicato" => fake()->text(),
            "conflictos_sindicato" => fake()->text(),
            "desacuerdos" => fake()->text(),
            "amenazasIntimidacion" => fake()->text(),
            "ult_cont_sindi" => fake()->text(),
            
        ];
    }
}
