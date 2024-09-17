<?php

namespace App\Http\Resources\Reportes\Relaciones;

use App\Models\Reportes\Relaciones\DocumentoLegal;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin DocumentoLegal */
class DocumentoLegalResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'es_oficial' => $this->es_oficial,
            'tipo_documento' => $this->tipo_documento,
            'numero_documento' => $this->numero_documento,
            'donde_radica' => $this->donde_radica,
            'nombre_servidor_publico' => $this->nombre_servidor_publico,
            'fecha_recepcion' => $this->fecha_recepcion,
            'desaparecido_id' => $this->desaparecido_id,
        ];
    }
}
