<?php

namespace App\Models\Reportes\Hipotesis;

use App\Models\Informaciones\Sitio;
use App\Models\Oficialidades\Area;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Hipotesis extends Model
{
    use Searchable;

    protected $table = 'hipotesis';

    protected $fillable = [
        'reporte_id',
        'tipo_hipotesis_id',
        'sitio_id',
        'area_asigna_sitio_id',
        'etapa',
        'descripcion',
    ];

    protected $casts = [
        'fecha_localizacion' => 'date',
    ];

    /**
     * Get the reporte that owns the hipotesis.
     *
     * @return BelongsTo
     */
    public function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class);
    }

    public function tipoHipotesis(): BelongsTo
    {
        return $this->belongsTo(TipoHipotesis::class);
    }

    public function sitio(): BelongsTo
    {
        return $this->belongsTo(Sitio::class);
    }

    public function areaAsignaSitio(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}
