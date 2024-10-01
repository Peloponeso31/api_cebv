<?php

namespace App\Http\Resources\Ubicaciones;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Ubicaciones\Estado */
class EstadoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'abreviatura_inegi' => $this->abreviatura_inegi,
            'abreviatura_cebv' => $this->abreviatura_cebv,
        ];
    }
}
