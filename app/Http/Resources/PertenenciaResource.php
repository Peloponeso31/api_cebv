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
            'grupo_pertenencia_id' => $this->grupo_pertenencia_id,
            'nombre' => $this-> nombre,
        ];
    }
}
