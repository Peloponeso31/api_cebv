<?php

namespace App\Http\Resources\Oficialidades;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Oficialidades\Folio */
class FolioResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'folio_cevb' => $this->folio_cebv,
            'folio_fub' => $this->folio_fub,
            'persona_id' => $this->persona_id,
            'reporte_id' => $this->reporte_id,
            'user_id' => $this->user_id,
        ];
    }
}
