<?php

namespace App\Http\Resources\Reportes;

use App\Http\Resources\Personas\PersonaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Reportes\Reporte */
class ReporteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tipo_reporte_id' => $this->tipo_reporte_id,
            'area_atiende_id' => $this->area_atiende_id,
            'medio_conocimiento_id' => $this->medio_conocimiento_id,
            'zona_estado_id' => $this->zona_estado_id,
            'hipotesis_oficial_id' => $this->hipotesis_oficial_id,
            'tipo_desaparicion' => $this->tipo_desaparicion,
            'fecha_localizacion' => $this->fecha_localizacion,
            'sintesis_localizacion' => $this->sintesis_localizacion,
            'clasificacion_persona' => $this->clasificacion_persona,
            'desaparecidos' => PersonaResource::collection($this->desaparecidos),
        ];
    }
}
