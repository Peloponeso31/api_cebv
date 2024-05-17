<?php

namespace Database\Factories\CondicionVulnerabilidad;

use App\Models\CondicionVulnerabilidad\Sangre;
use Illuminate\Database\Eloquent\Factories\Factory;


class CondicionVulnerabilidadFactory extends Factory
{

    public function definition(): array
    {
        return [
            "tipo_sangre_id" => fake()->numberBetween(1, Sangre::all()->count()-1),
            "condicion" => fake()->text(),
            "tratamiento" => fake()->text(),
            "naturaleza" => fake()->text(),
            "condicion_actualmente" => fake()->randomElement(['Sí', 'No']),
            "pertenencia_g_e" => fake()->randomElement(['Sí', 'No', 'NO ESPECIFICA']),
            "enfoque_diferenciado" => fake()->text(),
            "caracteristicas_vulnerabilidad" => fake()->text(),
            "info_localizacion" => fake()->text(),
            "embarazo"  => fake()->randomElement(['Sí', 'No']),
            "meses_embarazo" => function (array $data) {
                return $data['embarazo'] === 'Sí' ? fake()->numberBetween(1, 9) : 0;
            },
        ];
    }
}
