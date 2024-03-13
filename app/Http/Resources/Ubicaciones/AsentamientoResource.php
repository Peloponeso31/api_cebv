<?php

namespace App\Http\Resources\Ubicaciones;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Ubicaciones\Asentamiento */
class AsentamientoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'ambito' => $this->ambito,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
            'altitud' => $this->altitud,
        ];
    }
}
