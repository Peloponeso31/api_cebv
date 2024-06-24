<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\RedSocial */
class RedSocialResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'usuario' => $this->usuario,
            'observaciones' => $this->observaciones,

            'tipo_red_social_id' => $this->tipo_red_social_id,

            'tipoRedSocial' => new TipoRedSocialResource($this->whenLoaded('tipoRedSocial')),
        ];
    }
}
