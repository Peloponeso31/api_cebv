<?php

namespace App\Models\Reportes;

use App\Models\Informaciones\Medio;
use App\Models\Oficialidades\Area;
use App\Models\Reportes\Hipotesis\TipoHipotesis;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\Reportante;
use App\Models\Ubicaciones\ZonaEstado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Reporte extends Model
{
    use HasFactory, Searchable;

    protected $table = 'reportes';

    protected $fillable = [
        'tipo_reporte_id',
        'area_atiende_id',
        'medio_conocimiento_id',
        'zona_estado_id',
        'hipotesis_oficial_id',
        'tipo_desaparicion',
        'fecha_localizacion',
        'sintesis_localizacion',
        'clasificacion_persona',
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
     * Get the zona del estado that owns the reporte.
     *
     * @return BelongsTo
     */
    public function zonaEstado(): BelongsTo
    {
        return $this->belongsTo(ZonaEstado::class, 'zona_estado_id', 'idx_reportes_zona_estado');
    }

    public function hipotesisOficial(): BelongsTo
    {
        return $this->belongsTo(TipoHipotesis::class, 'hipotesis_oficial_id', 'idx_reportes_hipotesis_oficial');
    }

    public function reportantes(): HasMany
    {
        return $this->hasMany(Reportante::class, 'reporte_id');
    }

    public function desaparecidos(): HasMany
    {
        return $this->hasMany(Desaparecido::class, 'reporte_id');
    }



    /**
     * @return array
     */
    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'tipo_reporte_id' => $this->tipoReporte,
            'area_atiende_id' => $this->areaAtiende,
            'medio_conocimiento_id' => $this->medioConocimiento,
            'zona_estado_id' => $this->zonaEstado,
            'hipotesis_oficial_id' => $this->hipotesisOficial,
            'tipo_desaparicion' => $this->tipo_desaparicion,
            'fecha_localizacion' => $this->fecha_localizacion,
            'sintesis_localizacion' => $this->sintesis_localizacion,
            'clasificacion_persona' => $this->clasificacion_persona,
        ];
    }
}
