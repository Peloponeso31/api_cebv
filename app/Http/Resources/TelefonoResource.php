<?php

namespace App\Http\Resources;

use App\Models\Telefono;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Telefono
 */
class TelefonoResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'persona_id' => $this->persona_id,
            'compania' => CatalogoResource::make($this->compania),
            'numero' => $this->numero,
            'observaciones' => $this->observaciones,
            'es_movil' => $this->es_movil,
        ];
    }
}
