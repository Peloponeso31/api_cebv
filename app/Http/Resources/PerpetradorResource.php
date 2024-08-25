<?php

namespace App\Http\Resources;

use App\Models\Perpetrador;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Perpetrador */
class PerpetradorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'sexo' => CatalogoResource::make($this->sexo),
            'estatus_perpetrador' => CatalogoResource::make($this->estatusPerpetrador),
        ];
    }
}
