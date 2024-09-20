<?php

namespace App\Observers;

use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Models\Oficialidades\Area;
use App\Models\Reportes\Reporte;
use App\Models\Ubicaciones\ZonaEstado;
use Date;

class HechoDesaparicionObserver
{
    private function asignarAreaYZonaEstado(HechoDesaparicion $hechoDesaparicion): void
    {
        $reporte = Reporte::findOrFail($hechoDesaparicion->reporte_id);
        $fecha_desaparicion = $hechoDesaparicion->fecha_desaparicion;

        // Si sucedio en el estado de Veracruz:
        if ($hechoDesaparicion->lugarHechos->asentamiento->municipio->estado->id == "30") {
            // Comportamiento indefinido, funcionara siempre y cuando los
            // ids 'zonas-estados' y 'areas' coincidan el uno con el otro.
            $id = $hechoDesaparicion->lugarHechos->asentamiento->municipio->areaAtiende->id;

            $reporte->update([
                'area_atiende_id' => $id,
                'zona_estado_id' => $id
            ]);
        }
        else {
            $reporte->update([
                'zona_estado_id' => ZonaEstado::firstWhere('nombre', 'No aplica')->id,
            ]);
        }

        // Si la fecha de desaparicion es mayor a un año...
        if (isset($fecha_desaparicion) && $fecha_desaparicion->modify('+1 year') < Date::now()) {
            $reporte->update([
                'area_atiende_id' => Area::firstWhere('nombre', 'Larga Data')->id
            ]);
        }
    }

    /**
     * Handle the HechoDesaparicion "created" event.
     */
    public function created(HechoDesaparicion $hechoDesaparicion): void
    {
        $this->asignarAreaYZonaEstado($hechoDesaparicion);
    }

    /**
     * Handle the HechoDesaparicion "updated" event.
     */
    public function updated(HechoDesaparicion $hechoDesaparicion): void
    {
        $this->asignarAreaYZonaEstado($hechoDesaparicion);
    }

    /**
     * Handle the HechoDesaparicion "deleted" event.
     */
    public function deleted(HechoDesaparicion $hechoDesaparicion): void
    {
        //
    }

    /**
     * Handle the HechoDesaparicion "restored" event.
     */
    public function restored(HechoDesaparicion $hechoDesaparicion): void
    {
        //
    }

    /**
     * Handle the HechoDesaparicion "force deleted" event.
     */
    public function forceDeleted(HechoDesaparicion $hechoDesaparicion): void
    {
        //
    }
}
