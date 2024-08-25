<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Oreja */
class OrejaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'tamano_orejas' => CatalogoResource::make($this->tamanoOrejas),
            'forma_orejas' => CatalogoResource::make($this->formaOrejas),
            'especificaciones_orejas' => $this->especificaciones_orejas,
        ];
    }
}
