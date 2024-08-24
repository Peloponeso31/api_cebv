<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\EnfermedadPiel */
class EnfermedadPielResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'tipo_enfermedad_piel_id' => $this->tipo_enfermedad_piel_id,
            'descripcion' => $this->descripcion,
        ];
    }
}
