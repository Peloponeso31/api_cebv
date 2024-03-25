<?php

namespace App\Http\Resources\Reportes\Relaciones;

use App\Http\Resources\Personas\PersonaResource;
use App\Models\Personas\Persona;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Reportes\Relaciones\Reportante */
class ReportanteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            //'persona_id' => $this->persona_id,
            'persona' => new PersonaResource(Persona::find($this->persona_id)),
            'parentesco_id' => $this->parentesco_id,
            'denuncia_anonima' => $this->denuncia_anonima,
            'informacion_consentimiento' => $this->informacion_consentimiento,
            'informacion_exclusiva_busqueda' => $this->informacion_exclusiva_busqueda,
            'publicacion_registro_nacional' => $this->publicacion_registro_nacional,
            'publicacion_boletin' => $this->publicacion_boletin,
            'pertenencia_colectivo' => $this->pertenencia_colectivo,
            'nombre_colectivo' => $this->nombre_colectivo,
            'informacion_relevante' => $this->informacion_relevante,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
