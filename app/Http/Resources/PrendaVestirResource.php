<?php

namespace App\Http\Resources;

use App\Models\Catalogos\PrendaVestir;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin PrendaVestir
 */
class PrendaVestirResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'desaparecido_id' => $this->desaparecido_id,
            'pertenencia' => PertenenciaResource::make($this->pertenencia),
            'color' => CatalogoResource::make($this->color),
            'marca' => $this->marca,
            'descripcion' => $this->descripcion,
        ];
    }
}
