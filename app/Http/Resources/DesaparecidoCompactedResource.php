<?php

namespace App\Http\Resources;

use App\Models\Oficialidades\Folio;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Reportes\Relaciones\Desaparecido;

/** @mixin Desaparecido */
class DesaparecidoCompactedResource extends JsonResource
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
            'nombre' => $this->persona->nombre ?? null,
            'apellido_paterno' => $this->persona->apellido_paterno ?? null,
            'apellido_materno' => $this->persona->apellido_materno ?? null,
            'estatus_preliminar' => $this->estatusPreliminar->nombre ?? null,
            'estatus_formalizado' => $this->estatusFormalizado->nombre ?? null,
            'folio_cebv' => $this->folio()->folio_cebv ?? null,
        ];
    }
}
