<?php

namespace App\Http\Resources;

use App\Models\RedSocial;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin RedSocial */
class RedSocialResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'usuario' => $this->usuario,
            'observaciones' => $this->observaciones,
            'tipo_red_social' => CatalogoResource::make($this->tipoRedSocial),
        ];
    }
}
