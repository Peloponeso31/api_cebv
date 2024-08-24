<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\TipoHipotesisInmediata */
class TipoHipotesisInmediataResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'abreviatura' => $this->abreviatura,
            'nombre' => $this->nombre,
        ];
    }
}
