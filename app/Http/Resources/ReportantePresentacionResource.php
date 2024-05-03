<?php

namespace App\Http\Resources;

use App\Http\Resources\Personas\PersonaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportantePresentacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $default = [
            'parentesco' => $this->parentesco->nombre,
            'nombre_colectivo' => $this->nombre_colectivo,
            'informacion_relevante' => $this->informacion_relevante,
            'denuncia_anonima' => $this->denuncia_anonima,
            'informacion_consentimiento' => $this->informacion_consentimiento,
            'informacion_exclusiva_busqueda' => $this->informacion_exclusiva_busqueda,
            'publicacion_registro_nacional' => $this->publicacion_registro_nacional,
            'publicacion_boletin' => $this->publicacion_boletin,
            'pertenencia_colectivo' => $this->pertenencia_colectivo,
        ];

        if (!$this->denuncia_anonima) {
            $persona = new PersonaResource($this->persona);
            return array_merge($persona->toArray($request), $default);
        }

        return $default;
    }
}
