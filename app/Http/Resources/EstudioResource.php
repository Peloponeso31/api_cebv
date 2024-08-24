<?php

namespace App\Http\Resources;

use App\Http\Resources\Personas\PersonaResource;
use App\Http\Resources\Ubicaciones\DireccionResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Estudio */
class EstudioResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre_institucion' => $this->nombre_institucion,

            'persona_id' => $this->persona_id,
            'escolaridad_id' => $this->escolaridad_id,
            'estatus_escolaridad_id' => $this->estatus_escolaridad_id,
            'direccion_id' => $this->direccion_id,

            'persona' => new PersonaResource($this->whenLoaded('persona')),
            'escolaridad' => new EscolaridadResource($this->whenLoaded('escolaridad')),
            'estatusEscolaridad' => new EstatusEscolaridadResource($this->whenLoaded('estatusEscolaridad')),
            'direccion' => new DireccionResource($this->whenLoaded('direccion')),
        ];
    }
}
