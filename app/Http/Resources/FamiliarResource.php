<?php

namespace App\Http\Resources;

use App\Models\Familiar;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Familiar */
class FamiliarResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'parentesco' => CatalogoResource::make($this->parentesco),
            'nombre' => $this->nombre,
            'ha_ejercido_violencia' => $this->ha_ejercido_violencia,
            'es_familiar_cercano' => $this->es_familiar_cercano,
            'observaciones' => $this->observaciones,
        ];
    }
}
