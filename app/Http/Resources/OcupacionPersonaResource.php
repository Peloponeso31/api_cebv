<?php

namespace App\Http\Resources;

use App\Models\OcupacionPersona;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin OcupacionPersona */
class OcupacionPersonaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'ocupacion' => OcupacionResource::make($this->ocupacion),
            'persona_id' => $this->persona_id,
            'prioridad' => $this->prioridad,
            'observaciones' => $this->observaciones,
        ];
    }
}
