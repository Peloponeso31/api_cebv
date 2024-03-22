<?php

namespace App\Services;

use App\Models\Oficialidades\Folio;
use App\Models\Reportes\Reporte;

class ReporteService
{
    public function setFolio(mixed $id): void
    {
        $reporte = Reporte::findOrFail($id);

        if ($reporte) {
            foreach ($reporte->desaparecidos() as $desaparecido) {
                Folio::create([
                    'folio' => 'FOLIO-'.date('Y').'-'.str_pad($id, 5, '0', STR_PAD_LEFT),
                    'persona_id' => $desaparecido->id,
                    'reporte_id' => $id,
                    'user_id' => auth()->id(),
                ]);
            }
        }
    }
}
