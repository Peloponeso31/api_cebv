<?php

namespace App\Http\Resources\Reportes\Hechos;

use App\Http\Resources\CatalogoResource;
use App\Http\Resources\DesaparecidoPrettyResource;
use App\Http\Resources\Ubicaciones\DireccionResource;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin HechoDesaparicion */
class HechoDesaparicionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            'direccion' => DireccionResource::make($this->lugarHechos),
            'sitio' => CatalogoResource::make($this->sitio),
            'area_asigna_sitio' => CatalogoResource::make($this->areaAsignaSitio),
            'fecha_desaparicion_desconocida' => $this->fecha_desaparicion_desconocida,
            'fecha_desaparicion' => $this->fecha_desaparicion,
            'fecha_desaparicion_cebv' => $this->fecha_desaparicion_cebv,
            'hora_desaparicion' => $this->hora_desaparicion,
            'fecha_percato' => $this->fecha_percato,
            'fecha_percato_cebv' => $this->fecha_percato_cebv,
            'hora_percato' => $this->hora_percato,
            'aclaraciones_fecha_hechos' => $this->aclaraciones_fecha_hechos,
            'amenaza_cambio_comportamiento' => $this->amenaza_cambio_comportamiento,
            'descripcion_amenaza_cambio_comportamiento' => $this->descripcion_amenaza_cambio_comportamiento,
            'contador_desapariciones' => $this->contador_desapariciones,
            'situacion_previa' => $this->situacion_previa,
            'informacion_relevante' => $this->informacion_relevante,
            'hechos_desaparicion' => $this->hechos_desaparicion,
            'sintesis_desaparicion' => $this->sintesis_desaparicion,
            'desaparecio_acompanado' => $this->desaparecio_acompanado,
            'personas_mismo_evento' => $this->personas_mismo_evento,
            'desaparecidos' => DesaparecidoPrettyResource::collection($this->desaparecidos()),
            'resultado_rnd' => $this->resultado_rnd,
            'contexto_desaparicion' => $this->contexto_desaparicion,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
