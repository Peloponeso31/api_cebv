<?php

namespace App\Http\Resources\Personas;

use App\Http\Resources\ApodoResource;
use App\Http\Resources\GeneroResource;
use App\Http\Resources\NacionalidadResource;
use App\Http\Resources\SexoResource;
use App\Http\Resources\Ubicaciones\EstadoResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Personas\Persona */
class PersonaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'lugar_nacimiento' => EstadoResource::make($this->lugar_nacimiento),
            'nombre' => $this->nombre,
            'apellido_paterno' => $this->apellido_paterno,
            'apellido_materno' => $this->apellido_materno,
            'pseudonimo_nombre' => $this->pseudonimo_nombre,
            'pseudonimo_apellido_paterno' => $this->pseudonimo_apellido_paterno,
            'pseudonimo_apellido_materno' => $this->pseudonimo_apellido_materno,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'curp' => $this->curp,
            'observaciones_curp' => $this->observaciones_curp,
            'rfc' => $this->rfc,
            'ocupacion' => $this->ocupacion,
            'sexo' => SexoResource::make($this->sexo),
            'genero' => GeneroResource::make($this->genero),
            'apodos' => ApodoResource::collection($this->apodos),
            'nacionalidades' => NacionalidadResource::collection($this->nacionalidads)
        ];
    }
}
