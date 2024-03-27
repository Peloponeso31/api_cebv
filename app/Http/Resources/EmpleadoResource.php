<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmpleadoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "nombre"  => $this-> nombre,
            "apellido_paterno"  => $this->apellido_paterno,
            "apellido_materno"=> $this->apellido_materno,
            "fecha_nacimiento"=> $this->fecha_nacimiento,
            "puesto_id"=> $this->puesto_id,
            "oficina_id"=> $this->oficina_id,
        ];
    }
}
