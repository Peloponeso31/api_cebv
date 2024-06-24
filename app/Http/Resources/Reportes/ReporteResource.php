<?php

namespace App\Http\Resources\Reportes;

use App\Http\Resources\Informaciones\MedioResource;
use App\Http\Resources\Reportes\Hipotesis\TipoHipotesisResource;
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
            'esta_terminado' => $this->esta_terminado,
            'tipo_reporte' => TipoReporteResource::make($this->tipoReporte),
            'area_atiende_id' => $this->area_atiende_id,
            'medio_conocimiento' => MedioResource::make($this->medioConocimiento),
            'estado' => EstadoResource::make($this->estado),
            'zona_estado_id' => $this->zona_estado_id,
            'hipotesis_oficial' => TipoHipotesisResource::make($this->hipotesisOficial),
            'institucion_origen' => $this->institucion_origen,
            'tipo_desaparicion' => $this->tipo_desaparicion,
            'fecha_localizacion' => $this->fecha_localizacion,
            "declaracion_especial_ausencia" => $this->declaracion_especial_ausencia,
            "accion_urgente" => $this->accion_urgente,
            "dictamen" => $this->dictamen,
            "ci_nivel_federal" => $this->ci_nivel_federal,
            "otro_derecho_humano" => $this->otro_derecho_humano,
            'sintesis_localizacion' => $this->sintesis_localizacion,
            'reportantes' => ReportanteResource::collection($this->reportantes),
            'desaparecidos' => DesaparecidoResource::collection($this->desaparecidos),
            'fecha_creacion' => $this->fecha_creacion,
            'fecha_actualizacion' => $this->fecha_actualizacion,
        ];
    }
}
