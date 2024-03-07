<?php

namespace App\Models\Reportes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoReporte extends Model
{
    protected $table = 'tipos_reportes';

    public $timestamps = false;

    /**
     * Get all the reportes for the tipo de reporte.
     *
     * @return HasMany
     */
    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class);
    }
}
