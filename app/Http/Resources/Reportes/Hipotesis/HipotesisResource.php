<?php

namespace App\Http\Resources\Reportes\Hipotesis;

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
            'tipo_hipotesis' => TipoHipotesisResource::make($this->tipoHipotesis),
            'etapa' => $this->etapa,
        ];
    }
}
