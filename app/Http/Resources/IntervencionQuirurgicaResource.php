<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\IntervencionQuirurgica */
class IntervencionQuirurgicaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'tipo_intervencion_quirurgica_id' => $this->tipo_intervencion_quirurgica_id,
            'descripcion' => $this->descripcion,
        ];
    }
}
