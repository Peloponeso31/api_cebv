<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TelefonoResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'numero' => $this->numero,
            'persona_id' => $this->persona_id,
            'observaciones'=> $this->observaciones,
            'es_movil' => $this->es_movil,
            'compania' => CompaniaTelefonicaResource::make($this->compania),
        ];
    }
}
