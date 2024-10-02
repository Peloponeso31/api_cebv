<?php

namespace App\Http\Resources\Reportes;

use App\Http\Resources\BasicResource;
use App\Http\Resources\CatalogoResource;
use App\Http\Resources\ControlOgpiResource;
use App\Http\Resources\DatoComplementarioResource;
use App\Http\Resources\DesaparicionForzadaResource;
use App\Http\Resources\ExpedienteFisicoResource;
use App\Http\Resources\ExpedienteResource;
use App\Http\Resources\Informaciones\MedioResource;
use App\Http\Resources\PerpetradorResource;
use App\Http\Resources\Reportes\Hechos\HechoDesaparicionResource;
use App\Http\Resources\Reportes\Hipotesis\HipotesisResource;
use App\Http\Resources\Reportes\Hipotesis\TipoHipotesisResource;
use App\Http\Resources\Reportes\Relaciones\DesaparecidoResource;
use App\Http\Resources\Reportes\Relaciones\ReportanteResource;
use App\Http\Resources\Ubicaciones\EstadoResource;
use App\Http\Resources\VehiculoResource;
use App\Models\Reportes\Reporte;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Reporte */
class ReporteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            /**
             * Relaciones
             */
            'medio_conocimiento' => MedioResource::make($this->medioConocimiento),
            'institucion_origen' => CatalogoResource::make($this->institucion),
            'tipo_reporte' => BasicResource::make($this->tipoReporte),
            'area_atiende' => CatalogoResource::make($this->areaAtiende),
            'estado' => EstadoResource::make($this->estado),
            'zona_estado' => BasicResource::make($this->zonaEstado),
            'hipotesis_oficial' => TipoHipotesisResource::make($this->hipotesisOficial),

            'desaparecidos' => DesaparecidoResource::collection($this->desaparecidos),
            'reportantes' => ReportanteResource::collection($this->reportantes),
            'hechos_desaparicion' => HechoDesaparicionResource::make($this->hechosDesaparicion),
            'hipotesis' => HipotesisResource::collection($this->hipotesis),
            /**
             * Atributos
             */
            'esta_terminado' => $this->esta_terminado,
            'tipo_desaparicion' => $this->tipo_desaparicion,
            'fecha_creacion' => $this->fecha_creacion,
            'fecha_actualizacion' => $this->fecha_actualizacion,

            /**
             * Relaciones
             */
            'control_ogpi' => ControlOgpiResource::make($this->controlOgpi),
            // Expedientes
            'expedientes' => ExpedienteResource::collection($this->expedientes),
            // Desaparicion forzada
            'desaparicion_forzada' => DesaparicionForzadaResource::make($this->desaparicionForzada),
            // Perpetradores
            'perpetradores' => PerpetradorResource::collection($this->perpetradores),
            // Dato complementario
            'dato_complementario' => DatoComplementarioResource::make($this->datoComplementario),
            // Vehiculos
            'vehiculos' => VehiculoResource::collection($this->vehiculos),
            // Control de los expedientes fisicos
            'expediente_fisico' => ExpedienteFisicoResource::make($this->expedienteFisico),
        ];
    }
}
