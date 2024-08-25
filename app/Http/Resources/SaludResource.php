<?php

namespace App\Http\Resources;

use App\Models\Salud;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Salud */
class SaludResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'tipo_sangre' => CatalogoResource::make($this->tipoSangre()),
            'factor_rhesus' => $this->factor_rhesus,
        ];
    }
}
