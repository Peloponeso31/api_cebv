<?php

namespace App\Models\Reportes;

use App\Models\Informaciones\Medio;
use App\Models\Oficialidades\Area;
use App\Models\Oficialidades\Folio;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Models\Reportes\Hipotesis\Hipotesis;
use App\Models\Reportes\Hipotesis\TipoHipotesis;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\Reportante;
use App\Models\Ubicaciones\Estado;
use App\Models\Ubicaciones\ZonaEstado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;
use Illuminate\Support\Carbon;

class Reporte extends Model
{
    use HasFactory, Searchable;

    protected $table = 'reportes';

    public $timestamps = false;

    protected $fillable = [
        'tipo_reporte_id',
        'area_atiende_id',
        'medio_conocimiento_id',
        'estado_id',
        'zona_estado_id',
        'hipotesis_oficial_id',
        'esta_terminado',
        'tipo_desaparicion',
        'fecha_localizacion',
        'sintesis_localizacion',
        'clasificacion_persona',
        'fecha_creacion',
        'fecha_actualizacion',
    ];

    protected $casts = [
        'esta_terminado' => 'boolean',
        'fecha_localizacion' => 'datetime',
        'fecha_creacion' => 'datetime',
        'fecha_actualizacion' => 'datetime',
    ];

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
    public function areaAtiende(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_atiende_id');
    }

    /**
     * Get the medio that owns the reporte.
     *
     * @return BelongsTo
     */
    public function medioConocimiento(): BelongsTo
    {
        return $this->belongsTo(Medio::class, 'medio_conocimiento_id');
    }

    /**
     * Get the estado that owns the reporte.
     *
     * @return BelongsTo
     */
    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    /**
     * Get the zona del estado that owns the reporte.
     *
     * @return BelongsTo
     */
    public function zonaEstado(): BelongsTo
    {
        return $this->belongsTo(ZonaEstado::class, 'zona_estado_id');
    }

    public function hipotesisOficial(): BelongsTo
    {
        return $this->belongsTo(TipoHipotesis::class, 'hipotesis_oficial_id',);
    }

    public function reportantes(): HasMany
    {
        return $this->hasMany(Reportante::class, 'reporte_id');
    }

    public function desaparecidos(): HasMany
    {
        return $this->hasMany(Desaparecido::class, 'reporte_id');
    }

    public function folios(): HasMany
    {
        return $this->hasMany(Folio::class);
    }

    public function hechoDesaparicion(): HasOne
    {
        return $this->hasOne(HechoDesaparicion::class);
    }

    public function hipotesis(): HasMany
    {
        return $this->hasMany(Hipotesis::class, 'reporte_id');
    }

    /**
     * @return array
     */
    public function toSearchableArray(): array
    {
        return [
            'esta_terminado' => $this->esta_terminado,
        ];
    }
}
