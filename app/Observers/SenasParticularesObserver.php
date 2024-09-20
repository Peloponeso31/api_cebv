<?php

namespace App\Observers;

use App\Models\SenasParticulares;

class SenasParticularesObserver
{
    /**
     * Handle the SenasParticulares "created" event.
     */
    public function creating(SenasParticulares $senasParticulares): void
    {
        if ($senasParticulares->region_cuerpo_id == 3) {
            $senasParticulares->region_cuerpo_rnpdno_id = 2;
        }
    }

    /**
     * Handle the SenasParticulares "updated" event.
     */
    public function updated(SenasParticulares $senasParticulares): void
    {
        //
    }

    /**
     * Handle the SenasParticulares "deleted" event.
     */
    public function deleted(SenasParticulares $senasParticulares): void
    {
        //
    }

    /**
     * Handle the SenasParticulares "restored" event.
     */
    public function restored(SenasParticulares $senasParticulares): void
    {
        //
    }

    /**
     * Handle the SenasParticulares "force deleted" event.
     */
    public function forceDeleted(SenasParticulares $senasParticulares): void
    {
        //
    }
}
