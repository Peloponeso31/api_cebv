<?php

namespace App\Http\Resources\Personas;

use App\Http\Resources\AmistadResource;
use App\Http\Resources\BocaResource;
use App\Http\Resources\CabelloResource;
use App\Http\Resources\CatalogoResource;
use App\Http\Resources\ClubPersonaResource;
use App\Http\Resources\CondicionSaludResource;
use App\Http\Resources\ContextoEconomicoResource;
use App\Http\Resources\ContextoFamiliarResource;
use App\Http\Resources\ContextoSocialResource;
use App\Http\Resources\EmbarazoResource;
use App\Http\Resources\EnfermedadPielResource;
use App\Http\Resources\EnfoqueDiferenciadoResource;
use App\Http\Resources\EnfoquePersonalResource;
use App\Http\Resources\EstudioResource;
use App\Http\Resources\FamiliarResource;
use App\Http\Resources\IntervencionQuirurgicaResource;
use App\Http\Resources\MediaFiliacionComplementariaResource;
use App\Http\Resources\NarizResource;
use App\Http\Resources\OcupacionPersonaResource;
use App\Http\Resources\OjoResource;
use App\Http\Resources\OrejaResource;
use App\Http\Resources\PasatiempoPersonaResource;
use App\Http\Resources\PseudonimoResource;
use App\Http\Resources\ContactoResource;
use App\Http\Resources\SaludResource;
use App\Http\Resources\SenasParticularesResource;
use App\Http\Resources\TelefonoResource;
use App\Http\Resources\Ubicaciones\DireccionResource;
use App\Http\Resources\Ubicaciones\EstadoResource;
use App\Http\Resources\VelloFacialResource;
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
            /**
             * Atributos propios de persona
             */
            'id' => $this->id,
            'nombre' => $this->nombre,
            'apellido_paterno' => $this->apellido_paterno,
            'apellido_materno' => $this->apellido_materno,
            'apodo' => $this->apodo,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'curp' => $this->curp,
            'observaciones_curp' => $this->observaciones_curp,
            'rfc' => $this->rfc,
            'habla_espanhol' => $this->habla_espanhol,

            /**
             * Llaves foráneas
             */
            'sexo' => CatalogoResource::make($this->sexo),
            'genero' => CatalogoResource::make($this->genero),
            'religion' => CatalogoResource::make($this->religion),
            'lengua' => CatalogoResource::make($this->lengua),
            'razon_curp' => CatalogoResource::make($this->razon_curp_id),
            'lugar_nacimiento' => EstadoResource::make($this->lugarNacimiento),

            /**
             * Relaciones
             */
            'pseudonimos' => PseudonimoResource::collection($this->pseudonimos),
            'nacionalidades' => CatalogoResource::collection($this->nacionalidades),
            'telefonos' => TelefonoResource::collection($this->telefonos),
            'contactos' => ContactoResource::collection($this->contactos),
            'direcciones' => DireccionResource::collection($this->direcciones),
            'grupos_vulnerables' => CatalogoResource::collection($this->gruposVulnerables),
            'estudios' => EstudioResource::make($this->estudio),
            'senas_particulares' => SenasParticularesResource::collection($this->senasParticulares),
            'contexto_familiar' => ContextoFamiliarResource::make($this->contextoFamiliar),
            'contexto_social' => ContextoSocialResource::make($this->contextoSocial),
            'contexto_economico' => ContextoEconomicoResource::make($this->contextoEconomico),
            'salud' => SaludResource::make($this->salud),
            'ojos' => OjoResource::make($this->ojos),
            'cabello' => CabelloResource::make($this->cabello),
            'vello_facial' => VelloFacialResource::make($this->velloFacial),
            'nariz' => NarizResource::make($this->nariz),
            'boca' => BocaResource::make($this->boca),
            'orejas' => OrejaResource::make($this->oreja),
            'media_filiacion_complementaria' => MediaFiliacionComplementariaResource::make($this->mediaFiliacionComplementaria),
            'intervenciones_quirurgicas' => IntervencionQuirurgicaResource::collection($this->intervencionesQuirurgicas),
            'enfermedades_piel' => EnfermedadPielResource::collection($this->enfermedadesPiel),
            'condiciones_salud' => CondicionSaludResource::collection($this->condicionesSalud),
            'enfoque_diferenciado' => EnfoqueDiferenciadoResource::make($this->enfoqueDiferenciado),
            'enfoques_personales' => EnfoquePersonalResource::collection($this->getEnfoquesPersonales()),
            'ocupaciones' => OcupacionPersonaResource::collection($this->getOcupaciones()),
            'embarazo' => EmbarazoResource::make($this->embarazo),
            'familiares' => FamiliarResource::collection($this->familiares),
            'pasatiempos' => PasatiempoPersonaResource::collection($this->getPasatiempos()),
            'clubes' => ClubPersonaResource::collection($this->getClubes()),
            'amistades' => AmistadResource::collection($this->amistades),
        ];
    }
}
