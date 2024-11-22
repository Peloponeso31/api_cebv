<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportesDashboardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $reportantes = [];
        $desaparecidos = [];
        $fechaDesaparicion = $this->hechosDesapariciones->last()->fecha_desaparicion;

        foreach ($this->reportantes as $reportante) {
            $nombre = $reportante->persona->nombreCompleto();
            array_push($reportantes, $nombre);
        }

        foreach ($this->desaparecidos as $desaparecido) {
            $nombre = $desaparecido->persona->nombreCompleto();
            array_push($desaparecidos, $nombre);
        }

        return [
            "tipo_reporte" => $this->tipoReporte->nombre,
            "area_atiende" => $this->areaAtiende->nombre,
            "tipo_de_medio" => $this->medioConocimiento->tipoMedio->nombre,
            "medio_conocimiento" => $this->medioConocimiento->nombre,
            "zona_del_estado" => $this->zonaEstado->nombre,
            "reportantes" => $reportantes,
            "desaparecidos" => $desaparecidos,
            "fecha_desaparicion" => $this->when($fechaDesaparicion != null, $fechaDesaparicion),
        ];
    }
}
