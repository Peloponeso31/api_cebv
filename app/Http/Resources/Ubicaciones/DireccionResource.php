<?php

namespace App\Http\Resources\Ubicaciones;

use App\Models\Ubicaciones\Direccion;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Ubicaciones\Direccion */
class DireccionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'calle' => $this->calle,
            'colonia' => $this->colonia,
            'numero_exterior' => $this->numero_exterior,
            'numero_interior' => $this->numero_interior,
            'calle_1' => $this->calle_1,
            'calle_2' => $this->calle_2,
            'tramo_carretero' => $this->tramo_carretero,
            'codigo_postal' => $this->codigo_postal,
            'referencia' => $this->referencia,
            'asentamiento' => AsentamientoResource::make($this->asentamiento),
        ];
    }
}
