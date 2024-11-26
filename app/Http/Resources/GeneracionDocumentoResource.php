<?php

namespace App\Http\Resources;

use App\Models\GeneracionDocumento;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin GeneracionDocumento */
class GeneracionDocumentoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            'medio_difusion' => CatalogoResource::make($this->medioDifusion),
            'resultado_rnd' => $this->resultado_rnd,
            'firma_ausencia' => $this->firma_ausencia,
        ];
    }
}
