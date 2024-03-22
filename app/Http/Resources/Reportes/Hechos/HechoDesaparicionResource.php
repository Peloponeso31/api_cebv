<?php

namespace App\Http\Resources\Reportes\Hechos;

use App\Http\Resources\Reportes\ReporteResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Reportes\Hechos\HechoDesaparicion */
class HechoDesaparicionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            'cambio_comportamiento' => $this->cambio_comportamiento,
            'descripcion_cambio_comportamiento' => $this->descripcion_cambio_comportamiento,
            'fue_amenazado' => $this->fue_amenazado,
            'descripcion_amenaza' => $this->descripcion_amenaza,
            'contador_desapariciones' => $this->contador_desapariciones,
            'situacion_previa' => $this->situacion_previa,
            'informacion_relevante' => $this->informacion_relevante,
            'hechos_desaparicion' => $this->hechos_desaparicion,
            'sintesis_desaparicion' => $this->sintesis_desaparicion,

        ];
    }
}
