<?php

namespace App\Services;

use App\Helpers\ArrayHelpers;
use App\Helpers\PersonaAttributes as P;
use App\Models\Boca;
use App\Models\Cabello;
use App\Models\CondicionSalud;
use App\Models\Contacto;
use App\Models\ContextoFamiliar;
use App\Models\ContextoSocial;
use App\Models\Embarazo;
use App\Models\EnfermedadPiel;
use App\Models\EnfoqueDiferenciado;
use App\Models\EnfoquePersonal;
use App\Models\Estudio;
use App\Models\IntervencionQuirurgica;
use App\Models\MediaFiliacionComplementaria;
use App\Models\Nariz;
use App\Models\OcupacionPersona;
use App\Models\Ojo;
use App\Models\Oreja;
use App\Models\Personas\Persona;
use App\Models\Pseudonimo;
use App\Models\Salud;
use App\Models\SenasParticulares;
use App\Models\Telefono;
use App\Models\Ubicaciones\Direccion;
use App\Models\VelloFacial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SyncPersonaService
{
    public function persona(array $request): Model
    {
        $persona = ArrayHelpers::asyncHandler(Persona::class, $request, config('patterns.persona'));
        $personaId = $persona->getAttribute('id');

        if (isset($request[P::Pseudonimos]) && !is_null($request[P::Pseudonimos])) {
            $data = ArrayHelpers::setArrayRecursive($request[P::Pseudonimos], P::PersonaId, $personaId);
            ArrayHelpers::syncList(Pseudonimo::class, $data, P::PersonaId, $personaId);
        }

        if (isset($request[P::Nacionalidades]) && !is_null($request[P::Nacionalidades])) {
            $nacionalidades = [];

            foreach ($request[P::Nacionalidades] as $nacionalidad) {
                if (isset($nacionalidad['id'])) {
                    $nacionalidades[] = $nacionalidad['id'];
                }
            }

            $persona->nacionalidades()->sync($nacionalidades);
        }

        if (isset($request[P::GruposVulnerables]) && !is_null($request[P::GruposVulnerables])) {
            $grupos_vulnerables = [];

            foreach ($request[P::GruposVulnerables] as $grupoVulnerable) {
                if (isset($grupoVulnerable['id'])) {
                    $grupos_vulnerables[] = $grupoVulnerable['id'];
                }
            }

            $persona->gruposVulnerables()->sync($grupos_vulnerables);
        }

        if (isset($request[P::Telefonos]) && !is_null($request[P::Telefonos])) {
            $data = ArrayHelpers::setArrayRecursive($request[P::Telefonos], P::PersonaId, $personaId);

            ArrayHelpers::syncList(Telefono::class, $data, P::PersonaId, $personaId, config('patterns.telefono'));
        }

        if (isset($request[P::Contactos]) && !is_null($request[P::Contactos])) {
            $data = ArrayHelpers::setArrayRecursive($request[P::Contactos], P::PersonaId, $personaId);

            ArrayHelpers::syncList(Contacto::class, $data, P::PersonaId, $personaId);
        }

        if (isset($request[P::Direcciones]) && !is_null($request[P::Direcciones])) {
            $direcciones = [];

            foreach ($persona[P::Direcciones] as $direccion) {
                $direccionId = ArrayHelpers::asyncHandler(Direccion::class, $direccion, config('patterns.direccion'))->getAttribute('id');

                $direcciones[] = $direccionId;
            }

            $persona->direcciones()->sync($direcciones);
        }

        if (isset($request[P::SenasParticulares]) && !is_null($request[P::SenasParticulares])) {
            $senasModified = [];
            $data = ArrayHelpers::setArrayRecursive($request[P::SenasParticulares], P::PersonaId, $personaId);

            foreach ($data as $sena) {
                $senasModified[] = ArrayHelpers::asyncHandler(SenasParticulares::class, $sena, config('patterns.senas_particulares'))->getAttribute('id');

                if (isset($sena['encoded_image']) && $sena['encoded_image'] != null) {
                    $last_sena = SenasParticulares::findOrFail(end($senasModified));
                    $path = $persona->getAttribute('id') . '/senas_particulares/' . $last_sena->id . '.png';
                    Storage::put($path, base64_decode($sena['encoded_image']));
                    $last_sena->foto = $path;
                    $last_sena->save();
                }
            }

            $senasEliminables = $persona->senasParticulares->except($senasModified);
            if (count($senasEliminables) > 0) {
                $senasEliminables->toQuery()->delete();
            }
        }

        if (isset($request[P::Estudios]) && !is_null($request[P::Estudios])) {
            $data = ArrayHelpers::setArrayValue($request[P::Estudios], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(Estudio::class, $data, config('patterns.estudios'));
        }

        if (isset($request[P::ContextoFamiliar]) && !is_null($request[P::ContextoFamiliar])) {
            $data = ArrayHelpers::setArrayValue($request[P::ContextoFamiliar], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(ContextoFamiliar::class, $data, config('patterns.contexto_familiar'));
        }

        if (isset($request[P::Salud]) && !is_null($request[P::Salud])) {
            $data = ArrayHelpers::setArrayValue($request[P::Salud], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(Salud::class, $data, config('patterns.salud'));
        }

        if (isset($request[P::Ojos]) && !is_null($request[P::Ojos])) {
            $data = ArrayHelpers::setArrayValue($request[P::Ojos], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(Ojo::class, $data, config('patterns.ojos'));
        }

        if (isset($request[P::Cabello]) && !is_null($request[P::Cabello])) {
            $data = ArrayHelpers::setArrayValue($request[P::Cabello], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(Cabello::class, $data, config('patterns.cabello'));
        }

        if (isset($request[P::VelloFacial]) && !is_null($request[P::VelloFacial])) {
            $data = ArrayHelpers::setArrayValue($request[P::VelloFacial], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(VelloFacial::class, $data, config('patterns.vello_facial'));
        }

        if (isset($request[P::Nariz]) && !is_null($request[P::Nariz])) {
            $data = ArrayHelpers::setArrayValue($request[P::Nariz], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(Nariz::class, $data, config('patterns.nariz'));
        }

        if (isset($request[P::Boca]) && !is_null($request[P::Boca])) {
            $data = ArrayHelpers::setArrayValue($request[P::Boca], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(Boca::class, $data, config('patterns.boca'));
        }

        if (isset($request[P::Orejas]) && !is_null($request[P::Orejas])) {
            $data = ArrayHelpers::setArrayValue($request[P::Orejas], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(Oreja::class, $data, config('patterns.orejas'));
        }

        if (isset($request[P::MediaFiliacionComplementaria]) && !is_null($request[P::MediaFiliacionComplementaria])) {
            $data = ArrayHelpers::setArrayValue($request[P::MediaFiliacionComplementaria], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(MediaFiliacionComplementaria::class, $data, config('patterns.media_filiacion_complementaria'));
        }

        if (isset($request[P::IntervencionesQuirurgicas]) && !is_null($request[P::IntervencionesQuirurgicas])) {
            $data = ArrayHelpers::setArrayRecursive($request[P::IntervencionesQuirurgicas], P::PersonaId, $personaId);

            ArrayHelpers::syncList(
                IntervencionQuirurgica::class,
                $data,
                P::PersonaId,
                $personaId,
                config('patterns.intervencion_quirurgica'));
        }

        if (isset($request[P::EnfermedadesPiel]) && !is_null($request[P::EnfermedadesPiel])) {
            $data = ArrayHelpers::setArrayRecursive($request[P::EnfermedadesPiel], P::PersonaId, $personaId);

            ArrayHelpers::syncList(
                EnfermedadPiel::class,
                $data,
                P::PersonaId,
                $personaId,
                config('patterns.enfermedad_piel'));
        }

        if (isset($request[P::CondicionesSalud]) && !is_null($request[P::CondicionesSalud])) {
            $data = ArrayHelpers::setArrayRecursive($request[P::CondicionesSalud], P::PersonaId, $personaId);

            ArrayHelpers::syncList(CondicionSalud::class, $data, P::PersonaId, $personaId, config('patterns.condicion_salud'));
        }

        if (isset($request[P::EnfoqueDiferenciado]) && !is_null($request[P::EnfoqueDiferenciado])) {
            $data = ArrayHelpers::setArrayValue($request[P::EnfoqueDiferenciado], P::PersonaId, $personaId);
            ArrayHelpers::asyncHandler(EnfoqueDiferenciado::class, $data);
        }

        if (isset($request[P::ContextoSocial]) && !is_null($request[P::ContextoSocial])) {
            $data = ArrayHelpers::setArrayValue($request[P::ContextoSocial], P::PersonaId, $personaId);
            ArrayHelpers::asyncHandler(ContextoSocial::class, $data, config('patterns.contexto_social'));
        }

        if (isset($request[P::EnfoquesPersonales]) && !is_null($request[P::EnfoquesPersonales])) {
            $data = ArrayHelpers::setArrayRecursive($request[P::EnfoquesPersonales], P::PersonaId, $personaId);
            ArrayHelpers::syncList(EnfoquePersonal::class, $data, P::PersonaId, $personaId, config('patterns.enfoque_personal'));
        }

        if(isset($request[P::Ocupaciones]) && !is_null($request[P::Ocupaciones])) {
            $data = ArrayHelpers::setArrayRecursive($request[P::Ocupaciones], P::PersonaId, $personaId);
            ArrayHelpers::syncList(OcupacionPersona::class, $data, P::PersonaId, $personaId, config('patterns.ocupacion'));
        }

        if(isset($request[P::Embarazo]) && !is_null($request[P::Embarazo])) {
            $data = ArrayHelpers::setArrayValue($request[P::Embarazo], P::PersonaId, $personaId);
            ArrayHelpers::asyncHandler(Embarazo::class, $data);
        }

        return Persona::findOrFail($personaId);
    }
}
