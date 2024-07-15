<?php

namespace App\Http\Controllers;

use App\Helpers\SyncModules;
use App\Http\Requests\ReporteTotalRequest;
use App\Http\Resources\Reportes\ReporteResource;
use App\Models\Apodo;
use App\Models\Contacto;
use App\Models\Nacionalidad;
use App\Models\Personas\Persona;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Models\Reportes\Hipotesis\Hipotesis;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\DocumentoLegal;
use App\Models\Reportes\Relaciones\Reportante;
use App\Models\Reportes\Reporte;
use App\Models\Telefono;
use App\Models\Ubicaciones\Direccion;

class SyncReporteController extends Controller
{
    protected SyncModules $sync;

    function __construct(SyncModules $sync)
    {
        $this->sync = $sync;
    }

    private function updateOrCreatePersona($persona)
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
                $apodo_id = Apodo::updateOrCreate([
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

        return $persona_created->id;
    }

    public function actualizarReporteCascade(ReporteTotalRequest $request)
    {
        $reporte = Reporte::updateOrCreate(["id" => $request->id ?? null], [
            // Catalogos
            'tipo_reporte_id' => $request->tipo_reporte["id"] ?? null,
            'area_atiende_id' => $request->area_atiende["id"] ?? null,
            'medio_conocimiento_id' => $request->medio_conocimiento["id"] ?? null,
            'estado_id' => $request->estado["id"] ?? null,
            'zona_estado_id' => $request->zona_estado["id"] ?? null,
            'hipotesis_oficial_id' => $request->hipotesis_oficial["id"] ?? null,

            // Atributos
            'esta_terminado' => $request->esta_terminado ?? false,
            'institucion_origen' => $request->institucion_origen,
            'tipo_desaparicion' => $request->tipo_desaparicion,
            'fecha_localizacion' => $request->fecha_localizacion,
            "declaracion_especial_ausencia" => $request->declaracion_especial_ausencia ?? false,
            "accion_urgente" => $request->accion_urgente,
            "dictamen" => $request->dictamen,
            "ci_nivel_federal" => $request->ci_nivel_federal,
            "otro_derecho_humano" => $request->otro_derecho_humano,
            'sintesis_localizacion' => $request->sintesis_localizacion,
        ]);

        if ($request->has("hechos_desaparicion") && $request->hechos_desaparicion != null) {
            $this->syncHechosDesaparicion($reporte->id, $request);
        }

        if ($request->has("hipotesis") && $request->hipotesis != null) {
            $this->syncHipotesis($reporte->id, $request);
        }

        if ($request->has("reportantes") && $request->reportantes != null) {
            foreach ($request->reportantes as $reportante) {
                Reportante::updateOrCreate([
                    "id" => $reportante["id"] ?? null,
                    "reporte_id" => $reportante["reporte_id"] ?? $reporte->id ?? null
                ], [
                    "parentesco_id" => $reportante["parentesco"]["id"] ?? null,
                    "colectivo_id" => $reportante["colectivo"]["id"] ?? null,
                    "persona_id" => $this->updateOrCreatePersona($reportante["persona"]) ?? null,
                    "denuncia_anonima" => $reportante["denuncia_anonima"] ?? null,
                    "informacion_consentimiento" => $reportante["informacion_consentimiento"] ?? null,
                    "informacion_exclusiva_busqueda" => $reportante["informacion_exclusiva_busqueda"] ?? null,
                    "publicacion_registro_nacional" => $reportante["publicacion_registro_nacional"] ?? null,
                    "publicacion_boletin" => $reportante["publicacion_boletin"] ?? null,
                    "pertenencia_colectivo" => $reportante["pertenencia_colectivo"] ?? null,
                    "nombre_colectivo" => $reportante["nombre_colectivo"] ?? null,
                    "informacion_relevante" => $reportante["informacion_relevante"] ?? null,
                    "edad_estimada" => $reportante["edad_estimada"] ?? null,
                    "participacion_busquedas" => $reportante["participacion_busquedas"] ?? null,
                    "descripcion_extorsion" => $reportante["descripcion_extorsion"] ?? null,
                    "descripcion_donde_proviene" => $reportante["descripcion_donde_proviene"] ?? null
                ]);
            }
        }

        if ($request->has("desaparecidos") && $request->desaparecidos != null) {
            foreach ($request->desaparecidos as $desaparecido) {
                $desaparecido_updated = Desaparecido::updateOrCreate([
                    "id" => $desaparecido["id"] ?? null,
                    "reporte_id" => $desaparecido["reporte_id"] ?? $reporte->id ?? null
                ], [
                    'estatus_rpdno_id' => $desaparecido["estatus_rpdno"]["id"] ?? null,
                    'estatus_cebv_id' => $desaparecido["estatus_cebv"]["id"] ?? null,
                    'ocupacion_principal_id' => $desaparecido["ocupacion_principal"]["id"] ?? null,
                    'ocupacion_secundaria_id' => $desaparecido["ocupacion_secundaria"]["id"] ?? null,
                    "persona_id" => $this->updateOrCreatePersona($desaparecido["persona"]) ?? null,
                    'clasificacion_persona' => $desaparecido["clasificacion_persona"],
                    'habla_espanhol' => $desaparecido["habla_espanhol"],
                    'sabe_leer' => $desaparecido["sabe_leer"],
                    'sabe_escribir' => $desaparecido["sabe_escribir"],
                    'url_boletin' => $desaparecido["url_boletin"],
                    'declaracion_especial_ausencia' => $desaparecido["declaracion_especial_ausencia"],
                    'accion_urgente' => $desaparecido["accion_urgente"],
                    'dictamen' => $desaparecido["dictamen"],
                    'ci_nivel_federal' => $desaparecido["ci_nivel_federal"],
                    'otro_derecho_humano' => $desaparecido["otro_derecho_humano"],
                    'identidad_resguardada' => $desaparecido["identidad_resguardada"],
                    'alias' => $desaparecido["alias"],
                    'descripcion_ocupacion_principal' => $desaparecido["descripcion_ocupacion_principal"],
                    'descripcion_ocupacion_secundaria' => $desaparecido["descripcion_ocupacion_secundaria"],
                    'otras_especificaciones_ocupacion' => $desaparecido["otras_especificaciones_ocupacion"],
                    'nombre_pareja_conyugue' => $desaparecido["nombre_pareja_conyugue"],
                ]);

                if (isset($desaparecido["documentos_legales"]) && $desaparecido["documentos_legales"] != null) {
                    $documentos_modificados = [];
                    foreach ($desaparecido["documentos_legales"] as $documento) {
                        $documento_updated = DocumentoLegal::updateOrCreate([
                            "id" => $documento["id"] ?? null,
                            "desaparecido_id" => $documento["desaparecido_id"] ?? $desaparecido_updated["id"] ?? null,
                        ], [
                            "tipo_documento" => $documento["tipo_documento"],
                            "numero_documento" => $documento["numero_documento"],
                            'donde_radica' => $documento["donde_radica"],
                            'nombre_servidor_publico' => $documento["nombre_servidor_publico"],
                            'fecha_recepcion' => $documento["fecha_recepcion"],
                        ]);
                        array_push($documentos_modificados, $documento_updated->id);
                    }
                    $documentos_eliminables = $desaparecido_updated->documentosLegales->except($documentos_modificados);
                    if (count($documentos_eliminables) > 0) {
                        $documentos_eliminables->toQuery()->delete();
                    }
                }
            }
        }

        if ($request->has("control_ogpi") && $request->control_ogpi != null) {
            $this->sync->ControlOgpi($reporte->id, $request);
        }

        return ReporteResource::make($reporte);
    }

    /**
     * Delegación de responsabilidades
     */

    /**
     * Este método sincroniza los hechos de desaparición de un reporte,
     * se encarga de crear, actualizar y eliminar los hechos de desaparición
     * de un reporte según los datos que se le pasen desde el cliente.
     *
     * @param $reporteId
     * @param ReporteTotalRequest $request
     * @return void
     */
    public function syncHechosDesaparicion($reporteId, ReporteTotalRequest $request)
    {
        if (!is_int($reporteId) || $reporteId == null) return;

        HechoDesaparicion::updateOrCreate([
            'id' => $request->hechos_desaparicion["id"] ?? null,
            'reporte_id' => $reporteId,
        ], [
            'fecha_desaparicion' => $request->hechos_desaparicion["fecha_desaparicion"] ?? null,
            'fecha_desaparicion_cebv' => $request->hechos_desaparicion["fecha_desaparicion_cebv"] ?? null,
            'hora_desaparicion' => $request->hechos_desaparicion["hora_desaparicion"] ?? null,
            'fecha_percato' => $request->hechos_desaparicion["fecha_percato"] ?? null,
            'fecha_percato_cebv' => $request->hechos_desaparicion["fecha_percato_cebv"] ?? null,
            'hora_percato' => $request->hechos_desaparicion["hora_percato"] ?? null,
            'aclaraciones_fecha_hechos' => $request->hechos_desaparicion["aclaraciones_fecha_hechos"] ?? null,
            'cambio_comportamiento' => $request->hechos_desaparicion["cambio_comportamiento"] ?? false,
            'descripcion_cambio_comportamiento' => $request->hechos_desaparicion["descripcion_cambio_comportamiento"] ?? null,
            'fue_amenazado' => $request->hechos_desaparicion["fue_amenazado"] ?? null,
            'descripcion_amenaza' => $request->hechos_desaparicion["descripcion_amenaza"] ?? null,
            'contador_desapariciones' => $request->hechos_desaparicion["contador_desapariciones"] ?? null,
            'situacion_previa' => $request->hechos_desaparicion["situacion_previa"] ?? null,
            'informacion_relevante' => $request->hechos_desaparicion["informacion_relevante"] ?? null,
            'hechos_desaparicion' => $request->hechos_desaparicion["hechos_desaparicion"] ?? null,
            'sintesis_desaparicion' => $request->hechos_desaparicion["sintesis_desaparicion"] ?? null,
            'desaparecio_acompanado' => $request->hechos_desaparicion["desaparecio_acompanado"] ?? null,
            'personas_mismo_evento' => $request->hechos_desaparicion["personas_mismo_evento"] ?? null,
        ]);
    }

    public function syncHipotesis($reporteId, ReporteTotalRequest $request)
    {
        foreach ($request->hipotesis as $hp) {
            Hipotesis::updateOrCreate([
                'id' => $hp["id"] ?? null,
                'reporte_id' => $reporteId,
            ], [
                'tipo_hipotesis_id' => $hp["tipo_hipotesis"]["id"] ?? null,
                'sitio_id' => $hp["sitio"]["id"] ?? null,
                'area_asigna_sitio_id' => $hp["area_asigna_sitio"]["id"] ?? null,
                'etapa' => $hp["etapa"] ?? null,
            ]);
        }
    }
}
