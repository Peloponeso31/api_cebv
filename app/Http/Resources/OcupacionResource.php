<?php

namespace App\Http\Resources;

use App\Models\Ocupacion;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Ocupacion */
class OcupacionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tipo_ocupacion' => CatalogoResource::make($this->tipoOcupacion),
            'nombre' => $this->nombre,
        ];
    }
}
