<?php

namespace App\Http\Resources;

use App\Http\Resources\Personas\PersonaResource;
use App\Models\Embarazo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Embarazo */
class EmbarazoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'esta_embarazada' => $this->esta_embarazada,
            'meses' => $this->meses,
        ];
    }
}
