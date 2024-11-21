<?php

namespace App\Http\Resources;

use App\Models\FusionRegistro;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin FusionRegistro */
class FusionRegistroResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            'persona_uno' => PersonaCompactResource::make($this->personaUno),
            'persona_dos' => PersonaCompactResource::make($this->personaDos),
        ];
    }
}
