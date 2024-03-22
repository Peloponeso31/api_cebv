<?php

namespace App\Http\Resources;

use App\Http\Resources\Reportes\ReporteResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Folio */
class FolioResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'folio' => $this->folio,

            'reporte' => new ReporteResource($this->whenLoaded('reporte')),
        ];
    }
}
