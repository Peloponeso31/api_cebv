<?php

namespace App\Services;

use App\Helpers\ArrayHelpers;
use App\Helpers\PersonaAttributes as P;
use App\Models\Boca;
use App\Models\Cabello;
use App\Models\Contacto;
use App\Models\ContextoFamiliar;
use App\Models\EnfermedadPiel;
use App\Models\Estudio;
use App\Models\IntervencionQuirurgica;
use App\Models\MediaFiliacionComplementaria;
use App\Models\Nariz;
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

        if (isset($request[P::Pseudonimos])) {
            ArrayHelpers::syncList(Pseudonimo::class, $request[P::Pseudonimos], P::PersonaId, $personaId);
        }

        if (isset($request[P::Nacionalidades])) {
            $nacionalidades = [];

            foreach ($request[P::Nacionalidades] as $nacionalidad) {
                if (isset($nacionalidad['id'])) {
                    $nacionalidades[] = $nacionalidad['id'];
                }
            }

            $persona->nacionalidades()->sync($nacionalidades);
        }

        if (isset($request[P::GruposVulnerables])) {
            $grupos_vulnerables = [];

            foreach ($request[P::GruposVulnerables] as $grupoVulnerable) {
                if (isset($grupoVulnerable['id'])) {
                    $grupos_vulnerables[] = $grupoVulnerable['id'];
                }
            }

            $persona->gruposVulnerables()->sync($grupos_vulnerables);
        }

        if (isset($request[P::Telefonos])) {
            $data = ArrayHelpers::setArrayRecursive($request[P::Telefonos], P::PersonaId, $personaId);

            ArrayHelpers::syncList(Telefono::class, $data, P::PersonaId, $personaId);
        }

        if (isset($request[P::Contactos])) {
            $data = ArrayHelpers::setArrayRecursive($request[P::Contactos], P::PersonaId, $personaId);

            ArrayHelpers::syncList(Contacto::class, $data, P::PersonaId, $personaId);
        }

        if (isset($request[P::Direcciones])) {
            $direcciones = [];

            foreach ($persona[P::Direcciones] as $direccion) {
                $direccionId = ArrayHelpers::asyncHandler(Direccion::class, $direccion, config('patterns.direccion'))->getAttribute('id');

                $direcciones[] = $direccionId;
            }

            $persona->direcciones()->sync($direcciones);
        }

        if (isset($request[P::SenasParticulares])) {
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

        if (isset($request[P::Estudios])) {
            $data = ArrayHelpers::setArrayValue($request[P::Estudios], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(Estudio::class, $data, config('patterns.estudios'));
        }

        if (isset($request[P::ContextoFamiliar])) {
            $data = ArrayHelpers::setArrayValue($request[P::ContextoFamiliar], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(ContextoFamiliar::class, $data, config('patterns.contexto_familiar'));
        }

        if (isset($request[P::Salud])) {
            $data = ArrayHelpers::setArrayValue($request[P::Salud], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(Salud::class, $data, config('patterns.salud'));
        }

        if (isset($request[P::Ojos])) {
            $data = ArrayHelpers::setArrayValue($request[P::Ojos], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(Ojo::class, $data, config('patterns.ojos'));
        }

        if (isset($request[P::Cabello])) {
            $data = ArrayHelpers::setArrayValue($request[P::Cabello], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(Cabello::class, $data, config('patterns.cabello'));
        }

        if (isset($request[P::VelloFacial])) {
            $data = ArrayHelpers::setArrayValue($request[P::VelloFacial], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(VelloFacial::class, $data, config('patterns.vello_facial'));
        }

        if (isset($request[P::Nariz])) {
            $data = ArrayHelpers::setArrayValue($request[P::Nariz], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(Nariz::class, $data, config('patterns.nariz'));
        }

        if (isset($request[P::Boca])) {
            $data = ArrayHelpers::setArrayValue($request[P::Boca], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(Boca::class, $data, config('patterns.boca'));
        }

        if (isset($request[P::Orejas])) {
            $data = ArrayHelpers::setArrayValue($request[P::Orejas], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(Oreja::class, $data, config('patterns.orejas'));
        }

        if (isset($request[P::MediaFiliacionComplementaria])) {
            $data = ArrayHelpers::setArrayValue($request[P::MediaFiliacionComplementaria], P::PersonaId, $personaId);

            ArrayHelpers::asyncHandler(MediaFiliacionComplementaria::class, $data, config('patterns.media_filiacion_complementaria'));
        }


        if (isset($request[P::IntervencionesQuirurgicas])) {
            $data = ArrayHelpers::setArrayRecursive($request[P::IntervencionesQuirurgicas], P::PersonaId, $personaId);

            ArrayHelpers::syncList(
                IntervencionQuirurgica::class,
                $data,
                P::PersonaId,
                $personaId,
                config('patterns.intervencion_quirurgica'));
        }

        if (isset($request[P::EnfermedadesPiel])) {
            $data = ArrayHelpers::setArrayRecursive($request[P::EnfermedadesPiel], P::PersonaId, $personaId);

            ArrayHelpers::syncList(
                EnfermedadPiel::class,
                $data,
                P::PersonaId,
                $personaId,
                config('patterns.enfermedad_piel'));
        }

        return $persona;
    }
}
