<?php

namespace App\Http\Controllers;

use App\Helpers\SyncModules;
use App\Http\Requests\ReporteTotalRequest;
use App\Http\Resources\Reportes\ReporteResource;
use App\Models\Catalogos\PrendaVestir;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\DocumentoLegal;
use App\Models\Reportes\Relaciones\Reportante;
use App\Models\Reportes\Reporte;

class SyncReporteController extends Controller
{
    protected SyncModules $sync;

    function __construct(SyncModules $sync)
    {
        $this->sync = $sync;
    }

    private function getExtension($base64)
    {
        $formatos = [
            "IVBOR" => "png",
            "/9J/4" => "jpg",
            "AAAAF" => "mp4",
            "JVBER" => "pdf",
            "AAABA" => "ico",
            "UMFYI" => "rar",
            "E1XYD" => "rtf",
            "U1PKC" => "txt",
            "77U/M" => "srt",
        ];

        return $formatos[strtoupper($base64)] ?? '';
    }

    public function actualizarReporteCascade(ReporteTotalRequest $request)
    {
        $reporte = Reporte::updateOrCreate([
            'id' => $request->id ?? null
        ], [
            // Laves foráneas
            'tipo_reporte_id' => $request->tipo_reporte['id'] ?? null,
            'area_atiende_id' => $request->area_atiende['id'] ?? null,
            'medio_conocimiento_id' => $request->medio_conocimiento['id'] ?? null,
            'zona_estado_id' => $request->zona_estado['id'] ?? null,
            'hipotesis_oficial_id' => $request->hipotesis_oficial['id'] ?? null,
            'institucion_origen_id' => $request->institucion_origen['id'] ?? null,
            'estado_id' => $request->estado['id'] ?? null,
            // Atributos
            'esta_terminado' => $request->esta_terminado ?? null,
            'tipo_desaparicion' => $request->tipo_desaparicion ?? null,
        ]);

        if ($request->has("hechos_desaparicion") && $request->hechos_desaparicion != null) {
            $this->sync->HechosDesaparicion($reporte->id, $request);
        }

        if ($request->has("hipotesis") && $request->hipotesis != null) {
            $this->sync->Hipotesis($reporte->id, $request);
        }

        if ($request->has("reportantes") && $request->reportantes != null) {
            foreach ($request->reportantes as $reportante) {
                Reportante::updateOrCreate([
                    "id" => $reportante["id"] ?? null,
                    "reporte_id" => $reportante["reporte_id"] ?? $reporte->id ?? null
                ], [
                    "parentesco_id" => $reportante["parentesco"]["id"] ?? null,
                    "colectivo_id" => $reportante["colectivo"]["id"] ?? null,
                    "persona_id" => $this->sync->UpdateOrCreatePersona($reportante["persona"]) ?? null,
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
                    "persona_id" => $this->sync->UpdateOrCreatePersona($desaparecido["persona"]) ?? null,
                    'clasificacion_persona' => $desaparecido["clasificacion_persona"] ?? null,
                    'habla_espanhol' => $desaparecido["habla_espanhol"] ?? null,
                    'sabe_leer' => $desaparecido["sabe_leer"] ?? null,
                    'sabe_escribir' => $desaparecido["sabe_escribir"] ?? null,
                    'url_boletin' => $desaparecido["url_boletin"] ?? null,
                    'declaracion_especial_ausencia' => $desaparecido["declaracion_especial_ausencia"] ?? null,
                    'accion_urgente' => $desaparecido["accion_urgente"] ?? null,
                    'dictamen' => $desaparecido["dictamen"] ?? null,
                    'ci_nivel_federal' => $desaparecido["ci_nivel_federal"] ?? null,
                    'otro_derecho_humano' => $desaparecido["otro_derecho_humano"] ?? null,
                    'identidad_resguardada' => $desaparecido["identidad_resguardada"] ?? null,
                    'alias' => $desaparecido["alias"] ?? null,
                    'descripcion_ocupacion_principal' => $desaparecido["descripcion_ocupacion_principal"] ?? null,
                    'descripcion_ocupacion_secundaria' => $desaparecido["descripcion_ocupacion_secundaria"] ?? null,
                    'otras_especificaciones_ocupacion' => $desaparecido["otras_especificaciones_ocupacion"] ?? null,
                    'nombre_pareja_conyugue' => $desaparecido["nombre_pareja_conyugue"] ?? null,
                ]);

                if (isset($desaparecido["prendas_de_vestir"]) && $desaparecido["prendas_de_vestir"] != null) {
                    $prendas_modified = [];
                    foreach ($desaparecido["prendas_de_vestir"] as $prenda) {
                        $prendas_modified[] = PrendaVestir::updateOrCreate([
                            "id" => $prenda["id"] ?? null,
                            "desaparecido_id" => $prenda["desaparecido_id"] ?? $desaparecido_updated->id ?? null,
                        ], [
                            "pertenencia_id" => $prenda["pertenencia"]["id"] ?? null,
                            "color_id" => $prenda["color"]["id"] ?? null,
                            "marca" => $prenda["marca"] ?? null,
                            "descripcion" => $prenda["descripcion"] ?? null,
                        ])->id;
                    }

                    $prendas_eliminables = $desaparecido_updated->prendasDeVestir->except($prendas_modified);
                    if (count($prendas_eliminables) > 0) {
                        $prendas_eliminables->toQuery()->delete();
                    }
                }

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

        if ($request->has("expedientes") && $request->expedientes != null) {
            $this->sync->Expediente($reporte->id, $request);
        }

        if ($request->has("desaparicion_forzada") && $request->desaparicion_forzada != null) {
            $this->sync->DesaparicionForzada($reporte->id, $request);
        }

        if ($request->has("perpetradores") && $request->perpetradores != null) {
            $this->sync->Perpetradores($reporte->id, $request);
        }

        return ReporteResource::make($reporte);
    }
}
