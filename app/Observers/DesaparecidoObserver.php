<?php

namespace App\Observers;

use App\Models\Personas\EstatusPersona;
use App\Models\Reportes\Relaciones\Desaparecido;

class DesaparecidoObserver
{
    /**
     * Handle the Desaparecido "created" event.
     */
    public function created(Desaparecido $desaparecido): void
    {
        $id = 1;

        $desaparecido->update([
            'estatus_preliminar_id' => $id,
            'estatus_formalizado_id' => $id
        ]);
    }

    /**
     * Handle the Desaparecido "updated" event.
     */
    public function updated(Desaparecido $desaparecido): void
    {
        //
    }

    /**
     * Handle the Desaparecido "deleted" event.
     */
    public function deleted(Desaparecido $desaparecido): void
    {
        //
    }

    /**
     * Handle the Desaparecido "restored" event.
     */
    public function restored(Desaparecido $desaparecido): void
    {
        //
    }

    /**
     * Handle the Desaparecido "force deleted" event.
     */
    public function forceDeleted(Desaparecido $desaparecido): void
    {
        //
    }
}
