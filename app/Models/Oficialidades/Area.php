<?php

namespace App\Models\Oficialidades;

use App\Models\ExpedienteFisico;
use App\Models\Localizacion;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Models\Reportes\Reporte;
use App\Models\Ubicaciones\Municipio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    protected $table = 'cat_areas';

    protected $fillable = ['nombre'];

    public $timestamps = false;

    /**
     * Get the reportes for the area.
     *
     * @return HasMany
     */
    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class, 'area_atiende_id');
    }

    /**
     * Get the hipotesis for the area.
     *
     * @return HasMany
     */
    public function hechosDesaparicion(): HasMany
    {
        return $this->hasMany(HechoDesaparicion::class);
    }

    public function municipios(): HasMany
    {
        return $this->hasMany(Municipio::class, 'area_atiende_id', 'id');
    }

    public function expedienteFisicos(): HasMany
    {
        return $this->hasMany(ExpedienteFisico::class, 'area_receptora_id');
    }

    public function localizaciones(): HasMany
    {
        return $this->hasMany(Localizacion::class);
    }
}
