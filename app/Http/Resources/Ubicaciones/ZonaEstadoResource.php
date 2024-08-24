<?php

namespace App\Http\Resources\Ubicaciones;

use App\Http\Resources\Reportes\ReporteResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Ubicaciones\ZonaEstado */
class ZonaEstadoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'abreviatura' => $this->abreviatura,
        ];
    }
}
