<?php

namespace App\Http\Resources;

use App\Models\ContextoFamiliar;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin ContextoFamiliar
 */
class ContextoFamiliarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'numero_personas_vive' => $this->numero_personas_vive,
        ];
    }
}
