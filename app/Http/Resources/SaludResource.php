<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Salud */
class SaludResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'tipo_sangre' => TipoSangreResource::make($this->tipoSangre()),
            'factor_rhesus' => $this->factor_rhesus,
        ];
    }
}
