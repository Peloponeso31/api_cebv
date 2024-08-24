<?php

namespace App\Http\Resources\Informaciones;

use App\Http\Resources\Reportes\ReporteResource;
use App\Models\Informaciones\Medio;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Informaciones\Medio */
class MedioResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tipo_medio' => TipoMedioResource::make($this->tipoMedio),
            'nombre' => $this->nombre,
        ];
    }
}
