<?php

namespace Database\Factories\Reportes\Hechos;

use App\Models\Oficialidades\Area;
use App\Models\Personas\Persona;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Models\Reportes\Hipotesis\Hipotesis;
use App\Models\Reportes\Reporte;
use App\Models\Ubicaciones\Direccion;
use Illuminate\Database\Eloquent\Factories\Factory;
use phpDocumentor\Reflection\Types\Boolean;

class HechoDesaparicionFactory extends Factory
{
    protected $model = HechoDesaparicion::class;

    public function definition(): array
    {
        $amenaza = fake()->boolean(40);

        return [
            'reporte_id' => Reporte::factory(),
            'direccion_id' => Direccion::factory(),
            'sitio_id' => null,
            'fecha_desaparicion_desconocida' => fake()->boolean(40),
            'aclaraciones_fecha_hechos' => fake()->sentence(),
            'amenaza_cambio_comportamiento' => $amenaza,
            'descripcion_amenaza_cambio_comportamiento' => $amenaza ? fake()->sentence() : null,
            'contador_desapariciones' => fake()->numberBetween(1, 10),
            'situacion_previa' => fake()->sentence(),
            'informacion_relevante' => fake()->sentence(),
            'hechos_desaparicion' => fake()->text(),
            'sintesis_desaparicion' => fake()->text(),
            'desaparecio_acompanado' => fake()->boolean(40),
            'personas_mismo_evento' => fake()->numberBetween(1, 10),
            'fecha_desaparicion' => fake()->date(),
            'hora_desaparicion' => fake()->time(),
            'hora_percato' => fake()->time(),
        ];
    }
}
