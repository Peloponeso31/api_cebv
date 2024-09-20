<?php

namespace App\Http\Resources;

use App\Models\ContextoEconomico;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin ContextoEconomico
 */
class ContextoEconomicoResource extends JsonResource
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
            'donde_trabaja' => $this->donde_trabaja,
            'antiguedad_trabajo' => $this->antiguedad_trabajo,
            'gusta_trabajo' => $this->gusta_trabajo,
            'desea_trabajo_foraneo' => $this->desea_trabajo_foraneo,
            'ubicacion_trabajo_foraneo' => $this->ubicacion_trabajo_foraneo,
            'violencia_laboral' => $this->violencia_laboral,
            'violentador_laboral' => $this->violentador_laboral,
            'tiene_deudas' => $this->tiene_deudas,
            'monto_deuda' => $this->monto_deuda,
            'deuda_con' => $this->deuda_con,
            'otras_especificaciones_ocupacion' => $this->otras_especificaciones_ocupacion,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
