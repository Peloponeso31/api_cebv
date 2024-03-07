<?php

namespace App\Models\Reportes;

use App\Models\Persona;
use App\Models\Reportes\Hipotesis\Hipotesis;
use App\Models\Reportes\Informacion\HechoDesaparicion;
use App\Models\Reportes\Informacion\Medio;
use App\Models\Ubicaciones\Direccion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reporte extends Model
{
    protected $table = 'reportes';

    /**
     * The personas that belong to the reporte.
     *
     * @return BelongsToMany
     */
    public function personas(): BelongsToMany
    {
        return $this->belongsToMany(Persona::class);
    }

    /**
     * Get the tipo de reporte that owns the reporte.
     *
     * @return BelongsTo
     */
    public function tipoReporte(): BelongsTo
    {
        return $this->belongsTo(TipoReporte::class, 'tipo_reporte_id');
    }

    /**
     * Get the area that owns the reporte.
     *
     * @return BelongsTo
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    /**
     * Get the medio that owns the reporte.
     *
     * @return BelongsTo
     */
    public function medio(): BelongsTo
    {
        return $this->belongsTo(Medio::class, 'medio_id');
    }

    /**
     * Get the direccion that owns the reporte.
     *
     * @return BelongsTo
     */
    public function direccion(): BelongsTo
    {
        return $this->belongsTo(Direccion::class, 'direccion_id');
    }

    /**
     * Get the hecho de desaparicion associated with the reporte.
     *
     * @return HasOne
     */
    public function hechoDesaparicion(): HasOne
    {
        return $this->hasOne(HechoDesaparicion::class);
    }

    /**
     * Get the hipotesis associated with the reporte.
     *
     * @return HasOne
     */
    public function hipotesis(): HasMany
    {
        return $this->hasMany(Hipotesis::class);
    }
}
