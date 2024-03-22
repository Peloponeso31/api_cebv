<?php

namespace Database\Factories\Reportes\Relaciones;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportanteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'persona_id' => Persona::factory(),
            'reporte_id' => Reporte::factory(),
            'denuncia anonima' => fake()->boolean,
            'informacion_consentimiento' => fake()->boolean,
            'informacion_exclusiva_busqueda' => fake()->boolean,
            'publicacion_registro_nacional' => fake()->boolean,
            'publicacion_boletin' => fake()->boolean,
            'pertenencia_colectivo' => fake()->boolean,
            'nombre_colectivo' => fake()->name,
            'informacion_relevante' => fake()->sentence,

        ];
    }
}
