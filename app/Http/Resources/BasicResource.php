<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Clase que representa un recurso básico(catálogo) con abreviatura.
 *
 * @property mixed $id
 * @property mixed $nombre
 * @property mixed $abreviatura
 */
class BasicResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'abreviatura' => $this->abreviatura,
        ];
    }
}
