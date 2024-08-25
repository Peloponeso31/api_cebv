<?php

namespace App\Http\Resources;

use App\Models\ContextoSocial;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin ContextoSocial
 */
class ContextoSocialResource extends JsonResource
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
            'situacion_migratoria_id' => $this->situacion_migratoria_id,
            'esta_transito_estados_unidos' => $this->esta_transito_estados_unidos,
            'descripcion_proceso_migratorio' => $this->descripcion_proceso_migratorio,
        ];
    }
}
