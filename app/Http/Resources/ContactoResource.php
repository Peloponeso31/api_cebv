<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactoResource extends JsonResource
{

    public function toArray(Request $request): array
    {
       return [
        'id' => $this->id,
        'persona_id'=> $this->persona_id,
        'tipo'=> $this->tipo,
        'nombre'=> $this->nombre,
        'observaciones'=> $this->observaciones,
        'tipo_red_social' => TipoRedSocialResource::make($this->tipoRedSocial)
       ];
    }
}
