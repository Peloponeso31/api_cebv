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
     * Resource para listar personas desaparecidas o no localizadas solamente utilizando primitivos.
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
        
        $reportante = $this->reporte->reportantes->first();

        $reportante_nombre = "";
        if ($reportante->denuncia_anonima) {
            $reportante_nombre = "Anonimo";
        }
        else {
            $reportante_nombre = $reportante->persona->nombre." ".$reportante->persona->apellido_paterno." ".$reportante->persona->apellido_materno;
        }

        return [
            "folio_id" => $this->whenNotNull($folio->id ?? null),
            "desaparecido_id" => $this->id,
            "persona_id" => $this->persona->id,
            "reportante_id" => $reportante->id,
            "reportante_nombre" => $reportante_nombre,
            "folio_cebv" => $this->whenNotNull($folio->folio_cebv ?? null),
            "nombre_desaparecido" => $desaparecido,
            "curp_desaparecido" => $this->persona->curp,
            "fecha_desaparicion" => $this->whenNotNull($this->reporte->hechosDesapariciones->fecha_desaparicion ?? null),
        ];
    }
}
