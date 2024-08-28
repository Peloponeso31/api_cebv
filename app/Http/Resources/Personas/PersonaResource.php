<?php

namespace App\Http\Resources\Personas;

use App\Http\Resources\CatalogoResource;
use App\Http\Resources\ContextoFamiliarResource;
use App\Http\Resources\EstudioResource;
use App\Http\Resources\PseudonimoResource;
use App\Http\Resources\ContactoResource;
use App\Http\Resources\MediaFiliacionResource;
use App\Http\Resources\SenasParticularesResource;
use App\Http\Resources\TelefonoResource;
use App\Http\Resources\Ubicaciones\DireccionResource;
use App\Http\Resources\Ubicaciones\EstadoResource;
use App\Models\Personas\Persona;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Persona */
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
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'curp' => $this->curp,
            'observaciones_curp' => $this->observaciones_curp,
            'rfc' => $this->rfc,
            'sexo' => CatalogoResource::make($this->sexo),
            'genero' => CatalogoResource::make($this->genero),
            'apodos' => PseudonimoResource::collection($this->pseudonimos),
            'nacionalidades' => CatalogoResource::collection($this->nacionalidades),
            'estudios' => EstudioResource::make($this->estudio),
            'religion' => CatalogoResource::make($this->religion),
            'lengua' => CatalogoResource::make($this->lengua),
            'telefonos' => TelefonoResource::collection($this->telefonos),
            'contactos' => ContactoResource::collection($this->contactos),
            'direcciones' => DireccionResource::collection($this->direcciones),
            'grupos_vulnerables' => CatalogoResource::collection($this->gruposVulnerables),
            'senas_particulares' => SenasParticularesResource::collection($this->senasParticulares),
            'contexto_familiar' => ContextoFamiliarResource::make($this->contextoFamiliar),
        ];
    }
}
