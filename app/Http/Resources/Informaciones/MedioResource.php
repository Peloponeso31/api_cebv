<?php

namespace App\Http\Resources\Informaciones;

use App\Http\Resources\Reportes\ReporteResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Informaciones\Medio */
class MedioResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tipo_medio_id' => $this->tipo_medio_id,
            'nombre' => $this->nombre,
        ];
    }
}
