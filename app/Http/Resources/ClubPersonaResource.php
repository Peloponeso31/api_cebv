<?php

namespace App\Http\Resources;

use App\Models\ClubPersona;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin ClubPersona */
class ClubPersonaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'club' => CatalogoResource::make($this->club),
        ];
    }
}
