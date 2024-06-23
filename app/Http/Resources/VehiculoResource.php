<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Vehiculo */
class VehiculoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'submarca' => $this->submarca,
            'placa' => $this->placa,
            'modelo' => $this->modelo,
            'numero_serie' => $this->numero_serie,
            'numero_motor' => $this->numero_motor,
            'numero_permiso' => $this->numero_permiso,
            'descripcion' => $this->descripcion,
            'localizado' => $this->localizado,

            'relacion_vehiculo_id' => $this->relacion_vehiculo_id,
            'tipo_vehiculo_id' => $this->tipo_vehiculo_id,
            'uso_vehiculo_id' => $this->uso_vehiculo_id,
            'marca_vehiculo_id' => $this->marca_vehiculo_id,
            'color_id' => $this->color_id,

            'relacionVehiculo' => new RelacionVehiculoResource($this->whenLoaded('relacionVehiculo')),
            'tipoVehiculo' => new TipoVehiculoResource($this->whenLoaded('tipoVehiculo')),
            'usoVehiculo' => new UsoVehiculoResource($this->whenLoaded('usoVehiculo')),
            'marcaVehiculo' => new MarcaVehiculoResource($this->whenLoaded('marcaVehiculo')),
        ];
    }
}
