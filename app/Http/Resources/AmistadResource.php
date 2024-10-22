<?php

namespace App\Http\Resources;

use App\Models\Amistad;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Amistad */
class AmistadResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'tipo_red_social' => CatalogoResource::make($this->tipoRedSocial),
            'nombre' => $this->nombre,
            'apellido_paterno' => $this->apellido_paterno,
            'apellido_materno' => $this->apellido_materno,
            'apodo' => $this->apodo,
            'telefono' => $this->telefono,
            'usuario_red_social' => $this->usuario_red_social,
            'observaciones_red_social' => $this->observaciones_red_social,
        ];
    }
}
