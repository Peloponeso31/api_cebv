<?php

namespace App\Http\Resources;

use App\Models\IntervencionQuirurgica;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin IntervencionQuirurgica */
class IntervencionQuirurgicaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'tipo_intervencion_quirurgica' => CatalogoResource::make($this->tipoIntervencionQuirurgica),
            'descripcion' => $this->descripcion,
        ];
    }
}
