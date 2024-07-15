<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PertenenciaResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this-> nombre,
            'grupo_pertenencia' => GrupoPertenenciaResource::make($this->grupoPertenencia),
        ];
    }
}
