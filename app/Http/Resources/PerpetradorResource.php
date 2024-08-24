<?php

namespace App\Http\Resources;

use App\Models\Ubicaciones\Estado;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Perpetrador */
class PerpetradorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,

            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,

            'reporte_id' => $this->reporte_id,
            'sexo' => SexoResource::make($this->sexo),
            'estatus_perpetrador' => EstatusPerpetradorResource::make($this->estatusPerpetrador),
        ];
    }
}
