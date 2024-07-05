<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReporteTotalRequest;
use App\Http\Resources\Reportes\ReporteResource;
use App\Models\Apodo;
use App\Models\Nacionalidad;
use App\Models\Personas\Persona;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\DocumentoLegal;
use App\Models\Reportes\Relaciones\Reportante;
use App\Models\Reportes\Reporte;

class SyncReporteController extends Controller
{
    private function updateOrCreatePersona($persona)
    {
        $persona_created = Persona::updateOrCreate(["id" => $persona["id"] ?? null], [
            'nombre' => $persona["nombre"] ?? null,
            'lugar_nacimiento_id' => $persona["lugar_nacimiento"]["id"] ?? null,
            'sexo_id' => $persona["sexo"]["id"] ?? null,
            'genero_id' => $persona["sexo"]["id"] ?? null,
            'religion_id' => $persona["religion"]["id"] ?? null,
            'lengua_id' => $persona["lengua"]["id"] ?? null,

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
            'nacionalidades' => $persona["nacionalidades"]?? null,

        ]);

        if (isset($persona["apodos"]) && $persona["apodos"] != null) {
            $apodos_modificados = [];
            foreach ($persona["apodos"] as $apodo) {
                $apodo_id = Apodo::updateOrCreate([
                    "id" => $apodo["id"] ?? null,
                    "persona_id" => $apodo["persona_id"] ?? $persona_created->id ?? null,
                ], $apodo)->id;
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

        return $persona_created->id;
    }

    public function actualizarReporteCascade(ReporteTotalRequest $request)
    {
        $reporte = Reporte::updateOrCreate(["id" => $request->id ?? null] , [
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
            HechoDesaparicion::updateOrCreate([
                "id" => $request->hechos_desaparicion["id"] ?? null,
                "reporte_id" => $request->hechos_desaparicion["reporte_id"]
            ], $request->hechos_desaparicion);
        }

        if ($request->has("reportantes") && $request->reportantes != null) {
            foreach ($request->reportantes as $reportante) {
                Reportante::updateOrCreate([
                    "id" => $reportante["id"] ?? null,
                    "reporte_id" => $reportante["reporte_id"] ?? $reporte->id ?? null
                ], [
                    "parentesco_id" => $reportante["parentesco"]["id"] ?? null,
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
                    'otro_derecho_humano' => $desaparecido["otro_derecho_humano"]
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

        return ReporteResource::make($reporte);
    }
}
