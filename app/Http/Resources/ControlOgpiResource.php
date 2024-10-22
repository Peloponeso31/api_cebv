<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\ControlOgpi */
class ControlOgpiResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            'estatus_rndpno' => BasicResource::make($this->estatusRndpno),
            'folio_fub' => $this->folio_fub,
            'autoridad_ingresa_fub' => $this->autoridad_ingresa_fub,
            'fecha_codificacion' => $this->fecha_codificacion,
            'nombre_codificador' => $this->nombre_codificador,
            'observaciones' => $this->observaciones,
            'numero_tarjeta' => $this->numero_tarjeta,
        ];
    }
}
