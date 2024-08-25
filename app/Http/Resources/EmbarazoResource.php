<?php

namespace App\Http\Resources;

use App\Http\Resources\Personas\PersonaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Embarazo */
class EmbarazoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'meses' => $this->meses,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
