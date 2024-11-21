<?php

namespace App\Http\Resources;

use App\Http\Resources\Ubicaciones\DireccionResource;
use App\Models\DatoComplementario;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin DatoComplementario */
class DatoComplementarioResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            'direccion' => DireccionResource::make($this->direccion),
        ];
    }
}
