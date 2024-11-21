<?php

namespace App\Http\Resources;

use App\Http\Resources\Reportes\Hechos\HechoDesaparicionResource;
use App\Models\Personas\Parentesco;
use App\Models\Reportes\Reporte;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Reporte */
class ReporteHechoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'folios' => FolioResource::collection($this->folios),
            'desaparecidos' => DesaparecidoPrettyResource::collection($this->desaparecidos),
            'hechos_desaparicion' => HechoDesaparicionResource::make($this->hechosDesaparicion),
        ];
    }
}
