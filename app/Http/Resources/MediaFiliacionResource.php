<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaFiliacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "persona_id"=>$this->persona,
            "ausencia_dientes_id"=>$this->ausencia_dientes,
            "tratamiento_dental_id"=>$this->tratamiento_dental,
            "tipo_menton_id"=>$this->tipo_menton,
            "especificacion_menton_id"=>$this->especificacion_menton,
            "region_deformacion_id"=>$this->region_deformacion,
            "especificacion_deformacion_id"=>$this->especificacion_deformacion,
            "intervencion_quirurgica_id"=>$this->intervencion_quirurgica,
            "especificacion_intervencion_quirurgica_id"=>$this->especificacion_intervencion_quirurgica,
            "tipo_enfermedad_piel_id"=>$this->tipo_enfermedad_piel,
            "especificacion_enfermedad_id"=>$this->especificacion_enfermedad,
            "observaciones_generales_id"=>$this->observaciones_generales,

        ];    
    }
}
