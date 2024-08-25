<?php

namespace App\Http\Resources\Reportes\Hipotesis;

use App\Http\Resources\CatalogoResource;
use App\Models\Reportes\Hipotesis\Hipotesis;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Hipotesis */
class HipotesisResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            'etapa' => $this->etapa,
            'tipo_hipotesis' => TipoHipotesisResource::make($this->tipoHipotesis),
            'sitio' => CatalogoResource::make($this->sitio),
            'area_asigna_sitio' => CatalogoResource::make($this->areaAsignaSitio),
        ];
    }
}
