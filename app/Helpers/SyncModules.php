<?php

namespace App\Helpers;

use App\Http\Requests\ReporteTotalRequest;
use App\Models\ControlOgpi;
use App\Models\DesaparicionForzada;
use App\Models\Expediente;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Models\Reportes\Hipotesis\Hipotesis;
use App\Models\Ubicaciones\Direccion;

class SyncModules
{
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
}
