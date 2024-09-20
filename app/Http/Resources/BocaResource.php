<?php

namespace App\Http\Resources;

use App\Models\Boca;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Boca */
class BocaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'tamano_boca' => CatalogoResource::make($this->tamanoBoca),
            'tamano_labios' => CatalogoResource::make($this->tamanoLabios),
            'especificaciones_boca' => $this->especificaciones_boca,
        ];
    }
}
