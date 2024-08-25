<?php

namespace App\Http\Resources;

use App\Models\EnfermedadPiel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin EnfermedadPiel */
class EnfermedadPielResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'tipo_enfermedad_piel' => CatalogoResource::make($this->tipoEnfermedadPiel),
            'descripcion' => $this->descripcion,
        ];
    }
}
