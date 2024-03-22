<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContextoEconomico>
 */
class ContextoEconomicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
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
            "ult_cont_sindi" => fake()->name(),

            "persona_id" => fake()->numberBetween(0, 1000),
        ];
    }
}
