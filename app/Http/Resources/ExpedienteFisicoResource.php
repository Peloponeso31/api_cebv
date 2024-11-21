<?php

namespace App\Http\Resources;

use App\Models\ExpedienteFisico;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin ExpedienteFisico */
class ExpedienteFisicoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
           'id' => $this->id,
           'reporte_id' => $this->reporte_id,
           'area_receptora' => CatalogoResource::make($this->area),
           'solicitante_expediente' => UserAdminResource::make($this->usuario),
           'fecha_cambio_area' => $this->fecha_cambio_area,
           'fecha_prestamo' => $this->fecha_prestamo,
           'fecha_devolucion' => $this->fecha_devolucion,
           'observaciones' => $this->observaciones,
        ];
    }
}
