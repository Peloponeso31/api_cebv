<?php

namespace App\Http\Resources\Reportes;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HechoDesaparicionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'direccion_id' => $this->direccion_id,
            'zona_estado' => $this->zona_estado,
            'area_id' => $this->area_id,
            'dependencia' => $this->dependencia,
            'fecha_desaparicion' => $this->fecha_desaparicion,
            'fecha_percato' => $this->fecha_percato,
            'cambio_comportamiento' => $this->cambio_comportamiento,
            'fue_amenazado' => $this->fue_amenazado,
            'descripcion_amenaza' => $this->descripcion_amenaza,
            'contador_desapariciones' => $this->contador_desapariciones,
            'situacion_previa' => $this->situacion_previa,
            'informacion_relevante' => $this->informacion_relevante,
            'hechos_desaparicion' => $this->hechos_desaparicion,
            'sintesis_desaparicion' => $this->sintesis_desaparicion,
            'hipotesis_id' => $this->hipotesis_id,
        ];
    }
}
