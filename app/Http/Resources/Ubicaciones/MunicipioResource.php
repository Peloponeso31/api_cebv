<?php

namespace App\Http\Resources\Ubicaciones;

use App\Models\Ubicaciones\Estado;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Ubicaciones\Municipio */
class MunicipioResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'estado' => EstadoResource::make($this->estado),
        ];
    }
}
