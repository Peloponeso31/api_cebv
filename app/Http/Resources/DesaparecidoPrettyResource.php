<?php

namespace App\Http\Resources;

use App\Models\Reportes\Relaciones\Desaparecido;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Desaparecido */
class DesaparecidoPrettyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'nombre' => $this->persona->nombre . ' ' . $this->persona->apellido_paterno . ' ' . $this->persona->apellido_materno,
        ];
    }
}
