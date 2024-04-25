<?php

namespace App\Http\Resources\Reportes;

use App\Http\Resources\Informaciones\MedioResource;
use App\Http\Resources\Reportes\Relaciones\DesaparecidoResource;
use App\Http\Resources\Reportes\Relaciones\ReportanteResource;
use App\Http\Resources\Ubicaciones\EstadoResource;
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
            'estado' => EstadoResource::make($this->estado),
            'zona_estado_id' => $this->zona_estado_id,
            'hipotesis_oficial_id' => $this->hipotesis_oficial_id,
            'tipo_desaparicion' => $this->tipo_desaparicion,
            'fecha_localizacion' => $this->fecha_localizacion,
            'sintesis_localizacion' => $this->sintesis_localizacion,
            'reportantes' => ReportanteResource::collection($this->reportantes),
            'desaparecidos' => DesaparecidoResource::collection($this->desaparecidos),
            'fecha_creacion' => $this->fecha_creacion,
            'fecha_actualizacion' => $this->fecha_actualizacion,
        ];
    }
}
