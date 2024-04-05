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
            'xd' => $this->id,
            'etapa' => $this->etapa,
            'descripcion' => $this->descripcion,
            'reporte_id' => $this->reporte_id,
            'tipo_hipotesis_id' => $this->tipo_hipotesis_id,
            'sitio_id' => $this->sitio_id,
            'area_asigna_sitio_id' => $this->area_asigna_sitio_id,
        ];
    }
}
