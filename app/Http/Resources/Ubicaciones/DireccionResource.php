<?php

namespace App\Http\Resources\Ubicaciones;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Ubicaciones\Direccion */
class DireccionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'asentamiento_id' => $this->asentamiento_id,
            'calle' => $this->calle,
            'numero_exterior' => $this->numero_exterior,
            'numero_interior' => $this->numero_interior,
            'calle_1' => $this->calle_1,
            'calle_2' => $this->calle_2,
            'tramo_carretero' => $this->tramo_carretero,
            'codigo_postal' => $this->codigo_postal,
            'referencia' => $this->referencia,
        ];
    }
}
