<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrendaDeVestirResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'grupo_pertenencia_id' => $this->grupo_pertenencia_id,
            'pertenencia_id' => $this->pertenencia_id,
            'color_id' => $this->color_id,
            'marca' => $this->marca,
            'descripcion' => $this->descripcion,
        ];
    }
}
