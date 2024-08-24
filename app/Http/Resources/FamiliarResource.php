<?php

namespace App\Http\Resources;

use App\Http\Resources\Personas\ParentescoResource;
use App\Http\Resources\Personas\PersonaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Familiar */
class FamiliarResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'ha_ejercido_violencia' => $this->ha_ejercido_violencia,
            'es_familiar_cercano' => $this->es_familiar_cercano,
            'observaciones' => $this->observaciones,

            'persona_id' => $this->persona_id,
            'parentesco_id' => $this->parentesco_id,

            'persona' => new PersonaResource($this->whenLoaded('persona')),
            'parentesco' => new ParentescoResource($this->whenLoaded('parentesco')),
        ];
    }
}
