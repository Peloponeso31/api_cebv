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
            'persona_id' => $this->persona_id,
            'color_ojos' => CatalogoResource::make($this->colorOjos),
            'forma_ojos' => CatalogoResource::make($this->formaOjos),
            'tamano_ojos' => CatalogoResource::make($this->tamanoOjos),
            'especificaciones_ojos' => $this->especificaciones_ojos,
        ];
    }
}
