<?php

namespace App\Http\Resources\Personas;

use App\Http\Resources\ApodoResource;
use App\Http\Resources\CatalogoResource;
use App\Http\Resources\ContactoResource;
use App\Http\Resources\EscolaridadResource;
use App\Http\Resources\EstadoConyugalResource;
use App\Http\Resources\GeneroResource;
use App\Http\Resources\GrupoVulnerableResource;
use App\Http\Resources\LenguaResource;
use App\Http\Resources\MediaFiliacionResource;
use App\Http\Resources\NacionalidadResource;
use App\Http\Resources\ReligionResource;
use App\Http\Resources\SenasParticularesResource;
use App\Http\Resources\SexoResource;
use App\Http\Resources\TelefonoResource;
use App\Http\Resources\Ubicaciones\DireccionResource;
use App\Http\Resources\Ubicaciones\EstadoResource;
use App\Models\MediaFiliacion;
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
            'nivel_escolaridad' => $this->nivel_escolaridad,

            'sexo' => SexoResource::make($this->sexo),
            'genero' => GeneroResource::make($this->genero),
            'apodos' => ApodoResource::collection($this->apodos),
            'nacionalidades' => NacionalidadResource::collection($this->nacionalidades),
            'religion' => ReligionResource::make($this->religion),
            'lengua' => LenguaResource::make($this->lengua),
            'telefonos' => TelefonoResource::collection($this->telefonos),
            'contactos' => ContactoResource::collection($this->contactos),
            'direcciones' => DireccionResource::collection($this->direcciones),
            'grupos_vulnerables' => GrupoVulnerableResource::collection($this->gruposVulnerables),
            'escolaridad' => EscolaridadResource::make($this->escolaridad),
            'estado_conyugal' => EstadoConyugalResource::make($this->estadoConyugal),
            'senas_particulares' => SenasParticularesResource::collection($this->senasParticulares),
            'media_filiacion' => MediaFiliacionResource::make($this->mediaFiliacion),
            'razon_no_presenta_curp' => CatalogoResource::make($this->razon_no_presenta_curp),
            // Contexto Familiar
            'numero_personas_vive' => $this->numero_personas_vive,
        ];
    }
}
