<?php

namespace Database\Factories\Reportes\Hechos;

use App\Models\Oficialidades\Area;
use App\Models\Personas\Persona;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Models\Reportes\Hipotesis\Hipotesis;
use App\Models\Reportes\Reporte;
use App\Models\Ubicaciones\Direccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class HechoDesaparicionFactory extends Factory
{
    protected $model = HechoDesaparicion::class;

    public function definition(): array
    {
        $amenaza = fake()->boolean(40);
        $comportamiento = fake()->boolean(40);
        $fechaDesaparicion = fake()->boolean ? fake()->dateTimeThisYear() : null;

        return [
            'reporte_id' => Reporte::factory(),
            'fecha_desaparicion' => $fechaDesaparicion,
            'fecha_percato' => fake()->dateTimeBetween('-1 week'),
            'cambio_comportamiento' => $comportamiento,
            'descripcion_cambio_comportamiento' => $comportamiento ? fake()->sentence() : null,
            'fue_amenazado' => $amenaza,
            'descripcion_amenaza' => $amenaza ? fake()->sentence() : null,
            'contador_desapariciones' => fake()->numberBetween(1, 10),
            'situacion_previa' => fake()->text(),
            'informacion_relevante' => fake()->text(),
            'hechos_desaparicion' => fake()->text(),
            'sintesis_desaparicion' => fake()->text(),
        ];
    }
}
