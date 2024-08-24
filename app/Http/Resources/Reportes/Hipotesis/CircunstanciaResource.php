<?php

namespace App\Http\Resources\Reportes\Hipotesis;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Reportes\Hipotesis\Circunstancia */
class CircunstanciaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'descripcion' => $this->descripcion,
        ];
    }
}
