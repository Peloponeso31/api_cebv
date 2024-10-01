<?php

namespace App\Http\Controllers;

use App\Helpers\ArrayHelpers;
use App\Helpers\JsonAttributes as A;
use App\Http\Requests\ReporteTotalRequest;
use App\Http\Resources\Reportes\ReporteResource;
use App\Models\Catalogos\PrendaVestir;
use App\Models\DatoComplementario;
use App\Models\DesaparicionForzada;
use App\Models\Expediente;
use App\Models\Perpetrador;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Models\Reportes\Hipotesis\Hipotesis;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\DocumentoLegal;
use App\Models\Reportes\Relaciones\Reportante;
use App\Models\Reportes\Reporte;
use App\Models\Ubicaciones\Direccion;
use App\Models\Vehiculo;
use App\Services\SyncPersonaService;
use Illuminate\Support\Facades\Log;

class SyncReporteController extends Controller
{
    protected SyncPersonaService $syncPersona;

    function __construct(SyncPersonaService $syncPersona)
    {
        $this->syncPersona = $syncPersona;
    }

    public function actualizarReporteCascade(ReporteTotalRequest $request)
    {
        $data = $request->toArray();

        if (is_null($data[A::EstaTerminado])) {
            /* El atributo 'esta_terminado' no puede ser null */
            $data[A::EstaTerminado] = false;
        }

        $reporteId = ArrayHelpers::asyncHandler(Reporte::class, $data, config('patterns.reporte'))->getAttribute('id');

        Log::info("Reporte: " . json_encode($data));

        if ($request->has(A::Reportantes) && !is_null($request->reportantes)) {
            foreach ($request->reportantes as $reportante) {
                $reportante = ArrayHelpers::setArrayValue($reportante, A::ReporteId, $reporteId);

                $reportante[A::Persona] = $this->syncPersona->persona($reportante[A::Persona]);

                ArrayHelpers::asyncHandler(Reportante::class, $reportante, config('patterns.reportante'));
            }
        }

        if ($request->has(A::Desaparecidos) && !is_null($request->desaparecidos)) {
            foreach ($request->desaparecidos as $desaparecido) {
                $desaparecido = ArrayHelpers::setArrayValue($desaparecido, A::ReporteId, $reporteId);

                $desaparecido[A::Persona] = $this->syncPersona->persona($desaparecido[A::Persona]);

                $desaparecidoId = ArrayHelpers::asyncHandler(Desaparecido::class, $desaparecido, config('patterns.desaparecido'))
                    ->getAttribute('id');

                if (isset($desaparecido[A::PrendasVestir]) && !is_null($desaparecido[A::PrendasVestir])) {
                    $data = ArrayHelpers::setArrayRecursive($desaparecido[A::PrendasVestir], A::DesaparecidoId, $desaparecidoId);

                    ArrayHelpers::syncList(
                        PrendaVestir::class,
                        $data,
                        A::DesaparecidoId,
                        $desaparecidoId,
                        config('patterns.prenda_vestir'));
                }

                if (isset($desaparecido[A::DocumentosLegales]) && !is_null($desaparecido[A::DocumentosLegales])) {
                    $data = ArrayHelpers::setArrayRecursive($desaparecido[A::DocumentosLegales], A::DesaparecidoId, $desaparecidoId);

                    ArrayHelpers::syncList(
                        DocumentoLegal::class,
                        $data,
                        A::DesaparecidoId,
                        $desaparecidoId);
                }
            }
        }

        if (isset($request[A::HechosDesaparicion]) && !is_null($request[A::HechosDesaparicion])) {
            $data = ArrayHelpers::setArrayValue($request[A::HechosDesaparicion], A::ReporteId, $reporteId);

            if (isset($data[A::Direccion]) && !is_null($data[A::Direccion])) {
                $data[A::Direccion] = ArrayHelpers::asyncHandler(Direccion::class, $data[A::Direccion], config('patterns.direccion'));

                Log::info("Direccion: " . json_encode($data[A::Direccion]));
            }

            ArrayHelpers::asyncHandler(HechoDesaparicion::class, $data, config('patterns.hecho_desaparicion'));
        }

        if (isset($request[A::Hipotesis]) && !is_null($request[A::Hipotesis])) {
            $data = ArrayHelpers::setArrayRecursive($request[A::Hipotesis], A::ReporteId, $reporteId);
            ArrayHelpers::syncList(Hipotesis::class, $data, A::ReporteId, $reporteId, config('patterns.hipotesis'));
        }

        if (isset($request[A::ControlOgpi]) && !is_null($request[A::ControlOgpi])) {
            $data = ArrayHelpers::setArrayValue($request[A::ControlOgpi], A::ReporteId, $reporteId);
            ArrayHelpers::asyncHandler(Reporte::class, $data);
        }

        if (isset($request[A::Expedientes]) && !is_null($request[A::Expedientes])) {
            $data = ArrayHelpers::setArrayRecursive($request[A::Expedientes], A::ReporteId, $reporteId);
            ArrayHelpers::syncList(Expediente::class, $data, A::ReporteId, $reporteId, config('patterns.expediente'));
        }

        if (isset($request[A::DesaparicionForzada]) && !is_null($request[A::DesaparicionForzada])) {
            $data = ArrayHelpers::setArrayValue($request[A::DesaparicionForzada], A::ReporteId, $reporteId);
            ArrayHelpers::asyncHandler(DesaparicionForzada::class, $data, config('patterns.desaparicion_forzada'));
        }

        if (isset($request[A::Perpetradores]) && !is_null($request[A::Perpetradores])) {
            $data = ArrayHelpers::setArrayRecursive($request[A::Perpetradores], A::ReporteId, $reporteId);
            ArrayHelpers::syncList(Perpetrador::class, $data, A::ReporteId, $reporteId, config('patterns.perpetrador'));
        }

        if (isset($request[A::DatoComplementario]) && !is_null($request[A::DatoComplementario])) {
            $data = ArrayHelpers::setArrayValue($request[A::DatoComplementario], A::ReporteId, $reporteId);

            if (isset($data[A::Direccion]) && !is_null($data[A::Direccion]))
                $data[A::Direccion] = ArrayHelpers::asyncHandler(Direccion::class, $data[A::Direccion], config('patterns.direccion'));

            ArrayHelpers::asyncHandler(DatoComplementario::class, $data, config('patterns.dato_complementario'));
        }

        if (isset($request[A::Vehiculos]) && !is_null($request[A::Vehiculos])) {
            $data = ArrayHelpers::setArrayRecursive($request[A::Vehiculos], A::ReporteId, $reporteId);
            ArrayHelpers::syncList(Vehiculo::class, $data, A::ReporteId, $reporteId, config('patterns.vehiculo'));
        }

        return ReporteResource::make(Reporte::findOrFail($reporteId));
    }
}
