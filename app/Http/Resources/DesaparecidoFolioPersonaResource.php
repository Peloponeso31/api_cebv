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

        $desaparecido = $this->persona->nombre." ".$this->persona->apellido_paterno." ".$this->persona->apellido_materno;

        return [
            "folio_id" => $this->whenNotNull($folio->id ?? null),
            "desaparecido_id" => $this->id,
            "persona_id" => $this->persona->id,
            "folio_cebv" => $this->whenNotNull($folio->folio_cebv ?? null),
            "nombre_desaparecido" => $desaparecido,
            "curp_desaparecido" => $this->persona->curp,
            "fecha_desaparicion" => $this->whenNotNull($this->reporte->hechosDesapariciones->fecha_desaparicion ?? null),
        ];
    }
}
