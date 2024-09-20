<?php

namespace App\Http\Resources;

use App\Models\EnfoquePersonal;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin EnfoquePersonal */
class EnfoquePersonalResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'tipo_enfoque_diferenciado' => CatalogoResource::make($this->tipoEnfoqueDiferenciado),
        ];
    }
}
