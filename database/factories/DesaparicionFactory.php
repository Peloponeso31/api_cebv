<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\Desaparicion;
use App\Models\Hipotesis;
use App\Models\Persona;
use App\Models\Ubicaciones\Direccion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DesaparicionFactory extends Factory
{
    protected $model = Desaparicion::class;

    public function definition(): array
    {
        $zonaEstado = ['Centro', 'Norte', 'Sur'];
        $amenaza = fake()->boolean(40);

        return [
            'persona_id' => Persona::factory(),
            'direccion_id' => Direccion::inRandomOrder()->first()->id,
            'zona_estado' => fake()->boolean(50) ? fake()->randomElement($zonaEstado) : null,
            'area_id' => Area::inRandomOrder()->first()->id,
            'dependencia' => fake()->word(),
            'fecha_desaparicion' => fake()->dateTimeThisYear(),
            'fecha_percato' => fake()->dateTimeThisYear(),
            'cambio_comportamiento' => fake()->boolean(),
            'fue_amenazado' => $amenaza,
            'descripcion_amenaza' => $amenaza ? fake()->text() : null,
            'contador_desapariciones' => fake()->boolean(50) ? fake()->numberBetween(1, 5) : 0,
            'situacion_previa' => fake()->text(),
            'informacion_relevante' => fake()->boolean(60) ? fake()->text() : null,
            'hechos_desaparicion' => fake()->text(),
            'sintesis_desaparicion' => fake()->text(),
            'hipotesis_id' => Hipotesis::inRandomOrder()->first()->id,
        ];
    }
}
