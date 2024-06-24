<?php

namespace App\Http\Resources\Reportes\Relaciones;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Reportes\Relaciones\DocumentoLegal */
class DocumentoLegalResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tipo_documento' => $this->tipo_documento,
            'numero_documento' => $this->numero_documento,
            'donde_radica' => $this->donde_radica,
            'nombre_servidor_publico' => $this->nombre_servidor_publico,
            'fecha_recepcion' => $this->fecha_recepcion,
            'desaparecido_id' => $this->desaparecido_id,
            //'desaparecido' => new DesaparecidoResource($this->whenLoaded('desaparecido')),
        ];
    }
}
