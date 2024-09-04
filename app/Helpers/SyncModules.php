<?php

namespace App\Helpers;

use App\Enums\ForeignKey as FK;
use App\Http\Requests\ReporteTotalRequest;
use App\Models\Contacto;
use App\Models\ContextoFamiliar;
use App\Models\ControlOgpi;
use App\Models\DesaparicionForzada;
use App\Models\Estudio;
use App\Models\Expediente;
use App\Models\MediaFiliacion;
use App\Models\Perpetrador;
use App\Models\Personas\Persona;
use App\Models\Pseudonimo;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Models\Reportes\Hipotesis\Hipotesis;
use App\Models\SenasParticulares;
use App\Models\Telefono;
use App\Models\Ubicaciones\Direccion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SyncModules
{
    public function Persona($request) : Model
    {

        $persona = ArrayHelpers::asyncHandler(new Persona, $request, config('patterns.persona'));

        if (isset($request['pseudonimos'])) {
            $data = $request['pseudonimos'];

            ArrayHelpers::syncList(new Pseudonimo, $data, FK::PersonaId->value, $persona->getAttribute('id'));
        }

        if (isset($request["nacionalidades"])) {
            $nacionalidades = [];

            foreach ($request["nacionalidades"] as $nacionalidad) {
                if (isset($nacionalidad["id"]) && $nacionalidad["id"] != null) {
                    $nacionalidades[] = $nacionalidad["id"];
                }
            }

            $persona->nacionalidades()->sync($nacionalidades);
        }

        if (isset($request["grupos_vulnerables"])) {
            $grupos_vulnerables = [];

            foreach ($request["grupos_vulnerables"] as $grupoVulnerable) {
                if (isset($grupoVulnerable["id"]) && $grupoVulnerable["id"] != null) {
                    $grupos_vulnerables[] = $grupoVulnerable["id"];
                }
            }
            $persona->gruposVulnerables()->sync($grupos_vulnerables);
        }

        if (isset($request['telefonos']) ) {
            $data = $request['telefonos'];
            $dataModified = [];

            foreach ($data as $item) {
                $item['persona_id'] = $persona->getAttribute('id');
                $dataModified[] = $item;
            }

            ArrayHelpers::syncList(new Telefono, $dataModified, FK::PersonaId->value, $persona->getAttribute('id'));
        }

        if (isset($request['contactos'])) {
            $data = $request['contactos'];
            $dataModified = [];

            foreach ($data as $item) {
                $item['persona_id'] = $persona->getAttribute('id');
                $dataModified[] = $item;
            }

            ArrayHelpers::syncList(new Telefono, $dataModified, FK::PersonaId->value, $persona->getAttribute('id'));
        }

        if (isset($request["direcciones"])) {
            $direcciones = [];

            foreach ($persona["direcciones"] as $direccion) {
                $direccion_created = Direccion::updateOrCreate([
                    "id" => $direccion["id"] ?? null
                ], [
                    "asentamiento_id" => $direccion["asentamiento"]["id"] ?? null,
                    "calle" => $direccion["calle"],
                    "domicilio_concatenado" => $direccion["domicilio_concatenado"] ?? null,
                    "colonia" => $direccion["colonia"],
                    "numero_exterior" => $direccion["numero_exterior"],
                    "numero_interior" => $direccion["numero_interior"],
                    "calle_1" => $direccion["calle_1"],
                    "calle_2" => $direccion["calle_2"],
                    "tramo_carretero" => $direccion["tramo_carretero"],
                    "codigo_postal" => $direccion["codigo_postal"],
                    "referencia" => $direccion["referencia"],
                ]);

                $direcciones[] = $direccion_created->id;
            }
            $persona->direcciones()->sync($direcciones);
        }

        if (isset($request["senas_particulares"])) {
            $senas_modified = [];

            foreach ($persona["senas_particulares"] as $sena) {
                $senas_modified[] = SenasParticulares::updateOrCreate([
                    "id" => $sena["id"] ?? null,
                    "persona_id" => $sena["persona"]["id"] ?? $personaId->id ?? null,
                ], [
                    "region_cuerpo_id" => $sena["region_cuerpo"]["id"] ?? null,
                    "lado_id" => $sena["lado"]["id"] ?? null,
                    "vista_id" => $sena["vista"]["id"] ?? null,
                    "tipo_id" => $sena["tipo"]["id"] ?? null,
                    "cantidad" => $sena["cantidad"] ?? null,
                    "descripcion" => $sena["descripcion"] ?? null,
                ])->id;

                if (isset($sena['encoded_image']) && $sena['encoded_image'] != null) {
                    $last_sena = SenasParticulares::findOrFail(end($senas_modified));
                    $path = $persona->getAttribute('id') . '/senas_particulares/' . $last_sena->id . '.png';
                    Storage::put($path, base64_decode($sena['encoded_image']));
                    $last_sena->foto = $path;
                    $last_sena->save();
                }
            }

            $senas_eliminables = $persona->senasParticulares->except($senas_modified);
            if (count($senas_eliminables) > 0) {
                $senas_eliminables->toQuery()->delete();
            }
        }

        if (isset($request["media_filiacion"])) {
            $media_filiacion = $persona["media_filiacion"];
            MediaFiliacion::updateOrCreate([
                "id" => $persona["media_filiacion"]["id"] ?? null,
                "persona_id" => $persona["persona_id"] ?? $personaId->id ?? null,
            ], [
                "estatura" => $media_filiacion["estatura"] ?? null,
                "peso" => $media_filiacion["peso"] ?? null,
                "complexion_id" => $media_filiacion["complexion"]["id"] ?? null,
                "color_piel_id" => $media_filiacion["color_piel"]["id"] ?? null,
                "color_ojos_id" => $media_filiacion["color_ojos"]["id"] ?? null,
                "color_cabello_id" => $media_filiacion["color_cabello"]["id"] ?? null,
                "tamano_cabello_id" => $media_filiacion["tamano_cabello"]["id"] ?? null,
                "tipo_cabello_id" => $media_filiacion["tipo_cabello"]["id"] ?? null,
            ]);
        }

        if (isset($request['estudios'])) {
            $data = $persona['estudios'];

            $data = ArrayHelpers::setArrayValue($data, FK::PersonaId->value, $persona->getAttribute('id'));

            ArrayHelpers::asyncHandler(new Estudio, $data, config('patterns.estudios'));
        }

        if (isset($request['contexto_familiar'])) {
            $data = $persona['contexto_familiar'];

            $data = ArrayHelpers::setArrayValue($data, FK::PersonaId->value, $persona->getAttribute('id'));

            ArrayHelpers::asyncHandler(new ContextoFamiliar, $data, config('patterns.contexto_familiar'));
        }

        return $persona;
    }

    public function ControlOgpi($reporteId, ReporteTotalRequest $request): void
    {
        if (!is_int($reporteId) || $reporteId == null) return;

        ControlOgpi::updateOrCreate([
            'id' => $request->control_ogpi['id'] ?? null,
            'reporte_id' => $reporteId,
        ], [
            'fecha_codificacion' => $request->control_ogpi['fecha_codificacion'] ?? null,
            'nombre_codificador' => $request->control_ogpi['nombre_codificador'] ?? null,
            'observaciones' => $request->control_ogpi['observaciones'] ?? null,
            'numero_tarjeta' => $request->control_ogpi['numero_tarjeta'] ?? null,
        ]);
    }

    public function HechosDesaparicion($reporteId, ReporteTotalRequest $request) : void
    {
        if (!is_int($reporteId) || $reporteId == null) return;

        HechoDesaparicion::updateOrCreate([
            'id' => $request->hechos_desaparicion["id"] ?? null,
            'reporte_id' => $reporteId,
        ], [
            'direccion_id' => $this->LugarHechos($request->hechos_desaparicion["lugar_hechos"]) ?? null,
            'fecha_desaparicion' => $request->hechos_desaparicion["fecha_desaparicion"] ?? null,
            'fecha_desaparicion_cebv' => $request->hechos_desaparicion["fecha_desaparicion_cebv"] ?? null,
            'hora_desaparicion' => $request->hechos_desaparicion["hora_desaparicion"] ?? null,
            'fecha_percato' => $request->hechos_desaparicion["fecha_percato"] ?? null,
            'fecha_percato_cebv' => $request->hechos_desaparicion["fecha_percato_cebv"] ?? null,
            'hora_percato' => $request->hechos_desaparicion["hora_percato"] ?? null,
            'aclaraciones_fecha_hechos' => $request->hechos_desaparicion["aclaraciones_fecha_hechos"] ?? null,
            'amenaza_cambio_comportamiento' => $request->hechos_desaparicion["amenaza_cambio_comportamiento"] ?? false,
            'descripcion_amenaza_cambio_comportamiento' => $request->hechos_desaparicion["descripcion_amenaza_cambio_comportamiento"] ?? null,
            'contador_desapariciones' => $request->hechos_desaparicion["contador_desapariciones"] ?? null,
            'situacion_previa' => $request->hechos_desaparicion["situacion_previa"] ?? null,
            'informacion_relevante' => $request->hechos_desaparicion["informacion_relevante"] ?? null,
            'hechos_desaparicion' => $request->hechos_desaparicion["hechos_desaparicion"] ?? null,
            'sintesis_desaparicion' => $request->hechos_desaparicion["sintesis_desaparicion"] ?? null,
            'desaparecio_acompanado' => $request->hechos_desaparicion["desaparecio_acompanado"] ?? null,
            'personas_mismo_evento' => $request->hechos_desaparicion["personas_mismo_evento"] ?? null,
        ]);
    }

    public function LugarHechos($lugar_hechos)
    {
        if ($lugar_hechos == null) return null;

        $direccion_created = Direccion::updateOrCreate([
            "id" => $lugar_hechos["id"] ?? null
        ], [
            "asentamiento_id" => $lugar_hechos["asentamiento"]["id"] ?? null,
            "calle" => $lugar_hechos["calle"] ?? null,
            "colonia" => $lugar_hechos["colonia"] ?? null,
            "numero_exterior" => $lugar_hechos["numero_exterior"] ?? null,
            "numero_interior" => $lugar_hechos["numero_interior"] ?? null,
            "calle_1" => $lugar_hechos["calle_1"] ?? null,
            "calle_2" => $lugar_hechos["calle_2"] ?? null,
            "tramo_carretero" => $lugar_hechos["tramo_carretero"] ?? null,
            "codigo_postal" => $lugar_hechos["codigo_postal"] ?? null,
            "referencia" => $lugar_hechos["referencia"] ?? null,
        ]);

        return $direccion_created->id;
    }

    public function Hipotesis($reporteId, ReporteTotalRequest $request) : void
    {
        if (!isset($request->expedientes)) return;

        // Obtener todos los ID de los registros existentes para el reporte
        $existentesIds = Expediente::where('reporte_id', $reporteId)
            ->pluck('id')
            ->toArray();

        // Recopilar los ID de los registros recibidos en la solicitud
        $recibidosIds = [];

        foreach ($request->hipotesis as $hp) {
            $registro = Hipotesis::updateOrCreate([
                'id' => $hp["id"] ?? null,
                'reporte_id' => $reporteId,
            ], [
                'tipo_hipotesis_id' => $hp["tipo_hipotesis"]["id"] ?? null,
                'sitio_id' => $hp["sitio"]["id"] ?? null,
                'area_asigna_sitio_id' => $hp["area_asigna_sitio"]["id"] ?? null,
                'etapa' => $hp["etapa"] ?? null,
            ]);

            // Guardar el ID actualizado o creado
            $recibidosIds[] = $registro->id;
        }

        // Identificar los ID que deben ser eliminados
        $eliminablesIds = array_diff($existentesIds, $recibidosIds);

        // Eliminar los registros que ya no están en la lista recibida
        if (!empty($eliminablesIds)) {
            Hipotesis::whereIn('id', $eliminablesIds)->delete();
        }
    }

    /**
     * Expedientes relacionados con el reporte
     */
    public function Expediente($reporteId, ReporteTotalRequest $request): void
    {
        if (!isset($request->expedientes)) return;

        // Obtener todos los ID de los registros existentes para el reporte
        $existentesIds = Expediente::where('reporte_id', $reporteId)
            ->pluck('id')
            ->toArray();

        // Recopilar los ID de los registros recibidos en la solicitud
        $recibidosIds = [];

        foreach ($request->expedientes as $item) {
            $registro = Expediente::updateOrCreate(
                [
                    'id' => $item["id"] ?? null,
                    'reporte_id' => $reporteId,
                ],
                [
                    'tipo' => $item["tipo"] ?? null,
                    'persona_id' => $item["persona"]["id"] ?? null,
                    'parentesco_id' => $item["parentesco"]["id"] ?? null,
                ]
            );
            // Guardar el ID actualizado o creado
            $recibidosIds[] = $registro->id;
        }

        // Identificar los ID que deben ser eliminados
        $eliminablesIds = array_diff($existentesIds, $recibidosIds);

        // Eliminar los registros que ya no están en la lista recibida
        if (!empty($eliminablesIds)) {
            Expediente::whereIn('id', $eliminablesIds)->delete();
        }
    }

    public function DesaparicionForzada($reporteId, ReporteTotalRequest $request): void
    {
        if (!isset($request->desaparicion_forzada)) return;

        DesaparicionForzada::updateOrCreate([
            'id' => $request->desaparicion_forzada['id'] ?? null,
            'reporte_id' => $reporteId,
        ], [
            'desaparecio_autoridad' => $request->desaparicion_forzada['desaparecio_autoridad'] ?? null,
            'autoridad_id' => $request->desaparicion_forzada['autoridad']['id'] ?? null,
            'descripcion_autoridad' => $request->desaparicion_forzada['descripcion_autoridad'] ?? null,
            'desaparecio_particular' => $request->desaparicion_forzada['desaparecio_particular'] ?? null,
            'particular_id' => $request->desaparicion_forzada['particular']['id'] ?? null,
            'descripcion_particular' => $request->desaparicion_forzada['descripcion_particular'] ?? null,
            'metodo_captura_id' => $request->desaparicion_forzada['metodo_captura']['id'] ?? null,
            'descripcion_metodo_captura' => $request->desaparicion_forzada['descripcion_metodo_captura'] ?? null,
            'medio_captura_id' => $request->desaparicion_forzada['medio_captura']['id'] ?? null,
            'descripcion_medio_captura' => $request->desaparicion_forzada['descripcion_medio_captura'] ?? null,
            'detencion_previa_extorsion' => $request->desaparicion_forzada['detencion_previa_extorsion'] ?? null,
            'descripcion_detencion_previa_extorsion' => $request->desaparicion_forzada['descripcion_detencion_previa_extorsion'] ?? null,
            'ha_sido_avistado' => $request->desaparicion_forzada['ha_sido_avistado'] ?? null,
            'donde_ha_sido_avistado' => $request->desaparicion_forzada['donde_ha_sido_avistado'] ?? null,
            'delitos_desaparicion' => $request->desaparicion_forzada['delitos_desaparicion'] ?? null,
            'descripcion_delitos_desaparicion' => $request->desaparicion_forzada['descripcion_delitos_desaparicion'] ?? null,
            'descripcion_grupo_perpetrador' => $request->desaparicion_forzada['descripcion_grupo_perpetrador'] ?? null,
        ]);
    }

    public function Perpetradores($reporteId, ReporteTotalRequest $request): void
    {
        if (!isset($request->perpetradores)) return;

        // Obtener todos los ID de los registros existentes para el reporte
        $IdExistentes = ArrayHelpers::getExistingId(new Perpetrador, 'reporte_id', $reporteId);

        // Recopilar los ID de los registros recibidos en la solicitud
        $IdRecibidos = [];

        foreach ($request->perpetradores as $item) {
            $registro = Perpetrador::updateOrCreate(
                [
                    'id' => $item["id"] ?? null,
                    'reporte_id' => $reporteId,
                ],
                [
                    'sexo_id' => $item["sexo"]["id"] ?? null,
                    'estatus_perpetrador_id' => $item["estatus_perpetrador"]["id"] ?? null,
                    'nombre' => $item["nombre"] ?? null,
                    'descripcion' => $item["descripcion"] ?? null,
                ]
            );

            // Guardar el ID actualizado o creado
            $IdRecibidos[] = $registro->id;
        }

        // Identificar los ID que deben ser eliminados
        $eliminablesIds = array_diff($IdExistentes, $IdRecibidos);

        // Eliminar los registros que ya no están en la lista recibida
        if (!empty($eliminablesIds)) {
            Perpetrador::whereIn('id', $eliminablesIds)->delete();
        }
    }
}
