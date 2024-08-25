<?php

namespace App\Http\Resources;

use App\Http\Resources\Personas\PersonaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Ojo */
class OjoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'especificaciones_ojos' => $this->especificaciones_ojos,

            'persona_id' => $this->persona_id,
            'color_ojos_id' => $this->color_ojos_id,
            'forma_ojos_id' => $this->forma_ojos_id,
            'tamano_ojos_id' => $this->tamano_ojos_id,

            'persona' => new PersonaResource($this->whenLoaded('persona')),
            'colorOjos' => new ColorOjoResource($this->whenLoaded('colorOjos')),
            'formaOjos' => new FormaOjoResource($this->whenLoaded('formaOjos')),
            'tamanoOjos' => new TamanoOjoResource($this->whenLoaded('tamanoOjos')),
        ];
    }
}
