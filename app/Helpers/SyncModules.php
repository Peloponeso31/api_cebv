<?php

namespace App\Helpers;

use App\Http\Requests\ReporteTotalRequest;
use App\Models\Contacto;
use App\Models\ContextoFamiliar;
use App\Models\ControlOgpi;
use App\Models\DesaparicionForzada;
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
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\AssignOp\Mod;

class SyncModules
{
    public function UpdateOrCreatePersona($persona)
    {
        $persona_created = Persona::updateOrCreate(["id" => $persona["id"] ?? null], [
            'nombre' => $persona["nombre"] ?? null,
            'lugar_nacimiento_id' => $persona["lugar_nacimiento"]["id"] ?? null,
            'sexo_id' => $persona["sexo"]["id"] ?? null,
            'genero_id' => $persona["sexo"]["id"] ?? null,
            'religion_id' => $persona["religion"]["id"] ?? null,
            'lengua_id' => $persona["lengua"]["id"] ?? null,
            'escolaridad_id' => $persona["escolaridad"]["id"] ?? null,
            'estado_conyugal_id' => $persona["estado_conyugal"]["id"] ?? null,

            'apellido_paterno' => $persona["apellido_paterno"] ?? null,
            'apellido_materno' => $persona["apellido_materno"] ?? null,
            'pseudonimo_nombre' => $persona["pseudonimo_nombre"] ?? null,
            'pseudonimo_apellido_paterno' => $persona["pseudonimo_apellido_paterno"] ?? null,
            'pseudonimo_apellido_materno' => $persona["pseudonimo_apellido_materno"] ?? null,
            'fecha_nacimiento' => $persona["fecha_nacimiento"] ?? null,
            'curp' => $persona["curp"] ?? null,
            'observaciones_curp' => $persona["observaciones_curp"] ?? null,
            'rfc' => $persona["rfc"] ?? null,
            'ocupacion' => $persona["ocupacion"] ?? null,
            'nacionalidades' => $persona["nacionalidades"] ?? null,
            'nivel_escolaridad' => $persona["nivel_escolaridad"] ?? null,
        ]);

        if (isset($persona["apodos"]) && $persona["apodos"] != null) {
            $apodos_modificados = [];
            foreach ($persona["apodos"] as $apodo) {
                $apodo_id = Pseudonimo::updateOrCreate([
                    "id" => $apodo["id"] ?? null,
                    "persona_id" => $apodo["persona_id"] ?? $persona_created->id ?? null,
                ], [
                    'nombre' => $apodo['nombre'],
                    'apellido_paterno' => $apodo['apellido_paterno'],
                    'apellido_materno' => $apodo['apellido_materno'],
                ])->id;
                array_push($apodos_modificados, $apodo_id);
            }

            $apodos_eliminables = $persona_created->apodos->except($apodos_modificados);
            if (count($apodos_eliminables) > 0) {
                $apodos_eliminables->toQuery()->delete();
            }
        }

        if (isset($persona["nacionalidades"]) && $persona["nacionalidades"] != null) {
            $nacionalidades = [];
            foreach ($persona["nacionalidades"] as $nacionalidad) {
                if (isset($nacionalidad["id"]) && $nacionalidad["id"] != null) {
                    array_push($nacionalidades, $nacionalidad["id"]);
                }
            }
            $persona_created->nacionalidades()->sync($nacionalidades);
        }

        if (isset($persona["grupos_vulnerables"]) && $persona["grupos_vulnerables"] != null) {
            $grupos_vulnerables = [];
            foreach ($persona["grupos_vulnerables"] as $grupoVulnerable) {
                if (isset($grupoVulnerable["id"]) && $grupoVulnerable["id"] != null) {
                    array_push($grupos_vulnerables, $grupoVulnerable["id"]);
                }
            }
            $persona_created->gruposVulnerables()->sync($grupos_vulnerables);
        }

        if (isset($persona["telefonos"]) && $persona["telefonos"] != null) {
            $telefonos_modificados = [];
            foreach ($persona["telefonos"] as $telefono) {
                $telefono_id = Telefono::updateOrCreate([
                    "id" => $telefono["id"] ?? null,
                    "persona_id" => $telefono["persona_id"] ?? $persona_created->id ?? null,
                ], [
                    'compania_id' => $telefono["compania"]["id"] ?? null,
                    'numero' => $telefono["numero"] ?? null,
                    'observaciones' => $telefono["observaciones"] ?? null,
                    'es_movil' => $telefono["es_movil"] ?? null,
                ])->id;
                array_push($telefonos_modificados, $telefono_id);
            }

            $telefonos_eliminables = $persona_created->telefonos->except($telefonos_modificados);
            if (count($telefonos_eliminables) > 0) {
                $telefonos_eliminables->toQuery()->delete();
            }
        }

        if (isset($persona["contactos"]) && $persona["contactos"] != null) {
            $contactos_modificados = [];
            foreach ($persona["contactos"] as $contacto) {
                $contacto_id = Contacto::updateOrCreate([
                    "id" => $contacto["id"] ?? null,
                    "persona_id" => $contacto["persona_id"] ?? $persona_created->id ?? null,
                ], [
                    'tipo' => $contacto["tipo"] ?? null,
                    'tipo_red_social_id' => $contacto["tipo_red_social"]["id"] ?? null,
                    'nombre' => $contacto["nombre"] ?? null,
                    'observaciones' => $contacto["observaciones"] ?? null,
                ])->id;
                array_push($contactos_modificados, $contacto_id);
            }

            $contactos_eliminables = $persona_created->contactos->except($contactos_modificados);
            if (count($contactos_eliminables) > 0) {
                $contactos_eliminables->toQuery()->delete();
            }
        }

        if (isset($persona["direcciones"]) && $persona["direcciones"] != null) {
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

                array_push($direcciones, $direccion_created->id);
            }
            $persona_created->direcciones()->sync($direcciones);
        }

        if (isset($persona["senas_particulares"]) && $persona["senas_particulares"] != null) {
            $senas_modified = [];
            foreach ($persona["senas_particulares"] as $sena) {
                $senas_modified[] = SenasParticulares::updateOrCreate([
                    "id" => $sena["id"] ?? null,
                    "persona_id" => $sena["persona"]["id"] ?? $persona_created->id ?? null,
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
                    $path = $persona_created->id . '/senas_particulares/' . $last_sena->id . '.png';
                    Storage::put($path, base64_decode($sena['encoded_image']));
                    $last_sena->foto = $path;
                    $last_sena->save();
                }
            }

            $senas_eliminables = $persona_created->senasParticulares->except($senas_modified);
            if (count($senas_eliminables) > 0) {
                $senas_eliminables->toQuery()->delete();
            }
        }

        if (isset($persona["media_filiacion"]) && $persona["media_filiacion"] != null) {
            $media_filiacion = $persona["media_filiacion"];
            MediaFiliacion::updateOrCreate([
                "id" => $persona["media_filiacion"]["id"] ?? null,
                "persona_id" => $persona["persona_id"] ?? $persona_created->id ?? null,
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

        return $persona_created->id;
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

    public function HechosDesaparicion($reporteId, ReporteTotalRequest $request)
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
        if ($lugar_hechos == null) return;

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

    public function Hipotesis($reporteId, ReporteTotalRequest $request)
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
        $existentesIds = $this->getExistingIds(new Perpetrador, 'reporte_id', $reporteId);

        // Recopilar los ID de los registros recibidos en la solicitud
        $recibidosIds = [];

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
            $recibidosIds[] = $registro->id;
        }

        // Identificar los ID que deben ser eliminados
        $eliminablesIds = array_diff($existentesIds, $recibidosIds);

        // Eliminar los registros que ya no están en la lista recibida
        if (!empty($eliminablesIds)) {
            Perpetrador::whereIn('id', $eliminablesIds)->delete();
        }
    }

    /**
     * Funciones para reducir líneas de código :)
     */
    // TODO: Renombrar o mover este método a un lugar más adecuado
    private function getExistingIds(Model $model, string $foreignKey, $foreignValue): array
    {
        $table = $model->getTable();

        if (!Schema::hasColumn($table, $foreignKey)) {
            throw new \InvalidArgumentException("La tabla $table no tiene la columna $foreignKey en la base de datos.");
        }

        return $model->newQuery() // Crea una nueva consulta para evitar usar una instancia existente
            ->where($foreignKey, $foreignValue)
            ->pluck('id')
            ->toArray();
    }
}
