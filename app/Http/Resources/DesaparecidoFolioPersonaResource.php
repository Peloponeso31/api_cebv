<?php

namespace App\Http\Resources;

use App\Http\Resources\Oficialidades\FolioResource;
use App\Http\Resources\Personas\PersonaResource;
use App\Models\Oficialidades\Folio;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DesaparecidoFolioPersonaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $folio = Folio::where([
            ['reporte_id', $this->reporte->id],
            ['persona_id', $this->persona->id],
        ])->first();

        return [
            "folio_id" => $this->whenNotNull($folio->id ?? null),
            "desaparecido_id" => $this->id,
            "persona_id" => $this->persona->id,
            "folio_cebv" => $this->whenNotNull($folio->folio_cebv ?? null),
            "fub" => $this->whenNotNull($folio->folio_fub ?? null),
            "nombre" => $this->persona->nombre,
            "apellido_paterno" => $this->persona->apellido_paterno,
            "apellido_materno" => $this->persona->apellido_materno,
            "fecha_desaparicion" => $this->whenNotNull($this->reporte->hechosDesapariciones->fecha_desaparicion ?? null),
        ];
    }
}
