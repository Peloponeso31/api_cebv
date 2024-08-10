<?php

namespace App\Http\Resources\Reportes\Hipotesis;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Reportes\Hipotesis\TipoHipotesis */
class TipoHipotesisResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'abreviatura' => $this->abreviatura,
            'descripcion' => $this->descripcion,
            'circunstancia' => CircunstanciaResource::make($this->circunstancia),
        ];
    }
}
