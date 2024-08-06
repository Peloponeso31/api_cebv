<?php

namespace App\Http\Resources\Reportes\Hipotesis;

use App\Http\Resources\Informaciones\SitioResource;
use App\Http\Resources\Oficialidades\AreaResource;
use App\Http\Resources\Reportes\ReporteResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Reportes\Hipotesis\Hipotesis */
class HipotesisResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            'etapa' => $this->etapa,
            'tipo_hipotesis' => TipoHipotesisResource::make($this->tipoHipotesis),
            'sitio' =>SitioResource::make($this->sitio),
            'area_asigna_sitio' => AreaResource::make($this->areaAsignaSitio),
        ];
    }
}
