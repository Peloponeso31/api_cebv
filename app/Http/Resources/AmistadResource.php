<?php

namespace App\Http\Resources;

use App\Http\Resources\Personas\PersonaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Amistad */
class AmistadResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'tipo_red_social_id' => $this->tipo_red_social_id,
            'nombre' => $this->nombre,
            'apellido_paterno' => $this->apellido_paterno,
            'apellido_materno' => $this->apellido_materno,
            'apodo' => $this->apodo,
            'telefono' => $this->telefono,
            'usuario_red_social' => $this->usuario_red_social,
            'observaciones_red_social' => $this->observaciones_red_social,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
