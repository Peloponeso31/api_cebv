<?php

namespace App\Http\Resources;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Vehiculo */
class VehiculoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            'relacion_vehiculo' => CatalogoResource::make($this->relacionVehiculo),
            'tipo_vehiculo' => CatalogoResource::make($this->tipoVehiculo),
            'uso_vehiculo' => CatalogoResource::make($this->usoVehiculo),
            'marca_vehiculo' => CatalogoResource::make($this->marcaVehiculo),
            'color' => CatalogoResource::make($this->color),
            'submarca' => $this->submarca,
            'placa' => $this->placa,
            'modelo' => $this->modelo,
            'numero_serie' => $this->numero_serie,
            'numero_motor' => $this->numero_motor,
            'numero_permiso' => $this->numero_permiso,
            'descripcion' => $this->descripcion,
            'localizado' => $this->localizado,
        ];
    }
}
