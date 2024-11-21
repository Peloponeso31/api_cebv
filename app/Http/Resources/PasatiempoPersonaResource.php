<?php

namespace App\Http\Resources;

use App\Models\PasatiempoPersona;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin PasatiempoPersona */
class PasatiempoPersonaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'pasatiempo' => CatalogoResource::make($this->pasatiempo),
        ];
    }
}
