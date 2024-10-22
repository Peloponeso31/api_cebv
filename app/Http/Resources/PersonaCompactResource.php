<?php

namespace App\Http\Resources;

use App\Models\Personas\Persona;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Persona */
class PersonaCompactResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'apellido_paterno' => $this->apellido_paterno,
            'apellido_materno' => $this->apellido_materno,
            'sexo' => CatalogoResource::make($this->sexo),
            'edad' => $this->edadAnhos(),
            'curp' => $this->curp,
            'fecha_nacimiento' => $this->fecha_nacimiento,
        ];
    }
}
