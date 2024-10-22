<?php

namespace App\Http\Resources\Informaciones;

use App\Http\Resources\CatalogoResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Informaciones\Medio */
class MedioResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tipo_medio' => CatalogoResource::make($this->tipoMedio),
            'nombre' => $this->nombre,
        ];
    }
}
