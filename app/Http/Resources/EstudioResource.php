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
            'persona_id' => $this->persona_id,
            'escolaridad' => CatalogoResource::make($this->escolaridad),
            'estatus_escolaridad' => CatalogoResource::make($this->estatusEscolaridad),
            'direccion_id' => $this->direccion_id,
            'nombre_institucion' => $this->nombre_institucion,
            'sabe_leer_escribir' => $this->sabe_leer_escribir,
        ];
    }
}
