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
            'situacion_migratoria' => CatalogoResource::make($this->situacionMigratoria),
            'esta_transito_estados_unidos' => $this->esta_transito_estados_unidos,
            'descripcion_proceso_migratorio' => $this->descripcion_proceso_migratorio,
            'descripcion_pasatiempos' => $this->descripcion_pasatiempos,
            'descripcion_clubes_organizaciones' => $this->descripcion_clubes_organizaciones,
        ];
    }
}
