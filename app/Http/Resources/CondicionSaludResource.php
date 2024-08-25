<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\CondicionSalud */
class CondicionSaludResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'tipo_condicion_salud' => CatalogoResource::make($this->tipoCondicionSalud),
            'indole_salud' => $this->indole_salud,
            'tratamiento' => $this->tratamiento,
            'observaciones' => $this->observaciones,
        ];
    }
}
