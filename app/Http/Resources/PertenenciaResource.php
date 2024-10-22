<?php

namespace App\Http\Resources;

use App\Models\Pertenencia;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Pertenencia
 */
class PertenenciaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this-> nombre,
            'grupo_pertenencia' => CatalogoResource::make($this->grupoPertenencia),
        ];
    }
}
