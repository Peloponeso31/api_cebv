<?php

namespace App\Http\Resources;

use App\Http\Resources\Personas\PersonaResource;
use App\Models\EnfoqueDiferenciado;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin EnfoqueDiferenciado */
class EnfoqueDiferenciadoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'pertenencia_grupal_etnica' => $this->pertenencia_grupal_etnica,
            'descripcion_vulnerabilidad' => $this->descripcion_vulnerabilidad,
            'informacion_relevante_busqueda' => $this->informacion_relevante_busqueda,
        ];
    }
}
