<?php

namespace App\Models\Reportes\Informacion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoMedio extends Model
{
    protected $table = 'tipos_medios';

    public $timestamps = false;

    /**
     * Get all the medios for the tipo de medio.
     *
     * @return HasMany
     */
    public function medios(): HasMany
    {
        return $this->hasMany(Medio::class);
    }
}
