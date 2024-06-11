<?php

namespace App\Http\Resources\Personas;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OcupacionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
        ];
    }
}
