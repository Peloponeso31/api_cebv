<?php

namespace App\Http\Resources\Reportes\Relaciones;

use App\Http\Resources\Personas\PersonaResource;
use App\Http\Resources\Reportes\ReporteResource;
use App\Models\Personas\Persona;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Reportes\Relaciones\Desaparecido */
class DesaparecidoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            //'persona_id' => $this->persona_id,
            'persona' =>  new PersonaResource(Persona::find($this->persona_id)),
            'habla_espanhol' => $this->habla_espanhol,
            'sabe_leer' => $this->sabe_leer,
            'sabe_escribir' => $this->sabe_escribir,
            'url_boletin' => $this->url_boletin,
        ];
    }
}
