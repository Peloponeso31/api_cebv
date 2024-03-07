<?php

namespace App\Http\Resources\Ubicaciones;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MunicipioResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            //'estado' => Estado::findOrFail($this->estado_id)->nombre,
            'estadoId' => $this->estado_id,
            'nombre' => $this->nombre
        ];
    }
}
