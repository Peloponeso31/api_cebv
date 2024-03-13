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
            'estado_id' => $this->estado_id,
            'estado_nombre' => Estado::whereId($this->estado_id)->first()->nombre,
            'nombre' => $this->nombre,
        ];
    }
}
