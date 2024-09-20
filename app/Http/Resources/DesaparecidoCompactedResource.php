<?php

namespace App\Http\Resources;

use App\Models\Oficialidades\Folio;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DesaparecidoCompactedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $folio = Folio::firstWhere([
            ['reporte_id', '=', $this->reporte_id],
            ["persona_id", "=", $this->persona->id]
        ]);

        return [
            'id' => $this->id,
            'nombre' => $this->persona->nombre ?? null,
            'apellido_paterno' => $this->persona->apellido_paterno ?? null,
            'apellido_materno' => $this->persona->apellido_materno ?? null,
            'estatus_cebv' => $this->estatusCebv->nombre ?? null,
            'estatus_rnpdno' => $this->estatusRpdno->nombre ?? null,
            'folio_cebv' => $folio->folio_cebv ?? null,
        ];
    }
}
