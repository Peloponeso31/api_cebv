<?php

namespace App\Http\Resources\Reportes;

use App\Http\Resources\Informaciones\MedioResource;
use App\Http\Resources\Oficialidades\AreaResource;
use App\Http\Resources\Reportes\Hechos\HechoDesaparicionResource;
use App\Http\Resources\Reportes\Hipotesis\HipotesisResource;
use App\Http\Resources\Reportes\Hipotesis\TipoHipotesisResource;
use App\Http\Resources\Reportes\Relaciones\DesaparecidoResource;
use App\Http\Resources\Reportes\Relaciones\ReportanteResource;
use App\Http\Resources\Ubicaciones\EstadoResource;
use App\Http\Resources\Ubicaciones\ZonaEstadoResource;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Reportes\Reporte */
class ReporteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $hecho = HechoDesaparicion::where('reporte_id', $this->id)->first();
        return [
            'id' => $this->id,
            'medio_conocimiento' => MedioResource::make($this->medioConocimiento),
            'tipo_reporte' => TipoReporteResource::make($this->tipoReporte),
            'area_atiende' => AreaResource::make($this->areaAtiende),
            'estado' => EstadoResource::make($this->estado),
            'zona_estado' => ZonaEstadoResource::make($this->zonaEstado),
            'hipotesis_oficial' => TipoHipotesisResource::make($this->hipotesisOficial),
            'reportantes' => ReportanteResource::collection($this->reportantes),
            'desaparecidos' => DesaparecidoResource::collection($this->desaparecidos),
            'hechos_desaparicion' => HechoDesaparicionResource::make($hecho),
            'hipotesis' => HipotesisResource::collection($this->hipotesis),
            'esta_terminado' => $this->esta_terminado,
            'institucion_origen' => $this->institucion_origen,
            'tipo_desaparicion' => $this->tipo_desaparicion,
            'fecha_localizacion' => $this->fecha_localizacion,
            "declaracion_especial_ausencia" => $this->declaracion_especial_ausencia,
            "accion_urgente" => $this->accion_urgente,
            "dictamen" => $this->dictamen,
            "ci_nivel_federal" => $this->ci_nivel_federal,
            "otro_derecho_humano" => $this->otro_derecho_humano,
            'sintesis_localizacion' => $this->sintesis_localizacion,
            'fecha_creacion' => $this->fecha_creacion,
            'fecha_actualizacion' => $this->fecha_actualizacion,
        ];
    }
}
