<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrendaVestirResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'desaparecido_id' => $this->desaparecido_id,
            'pertenencia' => PertenenciaResource::make($this->pertenencia),
            'color' => ColorResource::make($this->color),
            'marca' => $this->marca,
            'descripcion' => $this->descripcion,
        ];
    }
}
