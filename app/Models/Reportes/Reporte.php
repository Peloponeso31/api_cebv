<?php

namespace App\Models\Reportes;

use App\Enums\TipoDesaparicion;
use App\Http\Resources\ExpedienteResource;
use App\Models\ControlOgpi;
use App\Models\DatoComplementario;
use App\Models\DesaparicionForzada;
use App\Models\Expediente;
use App\Models\ExpedienteFisico;
use App\Models\FusionRegistro;
use App\Models\Informaciones\Medio;
use App\Models\Oficialidades\Area;
use App\Models\Oficialidades\Folio;
use App\Models\Oficialidades\Institucion;
use App\Models\Perpetrador;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Models\Reportes\Hipotesis\Hipotesis;
use App\Models\Reportes\Hipotesis\TipoHipotesis;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\Reportante;
use App\Models\Ubicaciones\Estado;
use App\Models\Ubicaciones\ZonaEstado;
use App\Models\Vehiculo;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Collection;
use Laravel\Scout\Searchable;

class Reporte extends Model
{
    use HasFactory, Searchable;

    protected $table = 'reportes';

    public $timestamps = false;

    protected $fillable = [
        'tipo_reporte_id',
        'area_atiende_id',
        'medio_conocimiento_id',
        'zona_estado_id',
        'hipotesis_oficial_id',
        'institucion_origen_id',
        'estado_id',
        'esta_terminado',
        'tipo_desaparicion',
        'fecha_creacion',
        'fecha_actualizacion',
    ];

    protected $casts = [
        'tipo_desaparicion' => TipoDesaparicion::class, // Única o múltiple
        'esta_terminado' => 'boolean',
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
    public function areaAtiende(): HasOne
    {
        return $this->hasOne(Area::class, 'id', 'area_atiende_id');
    }

    public function hechosDesaparicion(): HasOne
    {
        return $this->hasOne(HechoDesaparicion::class);
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
        return $this->belongsTo(TipoHipotesis::class, 'hipotesis_oficial_id');
    }

    public function reportantes(): HasMany
    {
        return $this->hasMany(Reportante::class);
    }

    public function desaparecidos(): HasMany
    {
        return $this->hasMany(Desaparecido::class);
    }

    public function folios(): HasMany
    {
        return $this->hasMany(Folio::class);
    }


    public function hipotesis(): HasMany
    {
        return $this->hasMany(Hipotesis::class, 'reporte_id');
    }

    public function perpetradores(): HasMany
    {
        return $this->hasMany(Perpetrador::class);
    }

    public function controlOgpi(): HasOne
    {
        return $this->hasOne(ControlOgpi::class);
    }

    public function vehiculos(): HasMany
    {
        return $this->hasMany(Vehiculo::class);
    }

    public function expedientesPadre(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'expedientes', 'reporte_uno_id', 'reporte_dos_id')
            ->withPivot('id','parentesco_id', 'tipo');
    }

    public function expedientesHijo(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'expedientes', 'reporte_dos_id', 'reporte_uno_id')
            ->withPivot('id','parentesco_id', 'tipo');
    }

    public function expedientes(): Collection
    {
        $reportes = $this->expedientesPadre->merge($this->expedientesHijo);
        return $reportes;
    }

    public function desaparicionForzada(): HasOne
    {
        return $this->hasOne(DesaparicionForzada::class);
    }

    public function institucion(): BelongsTo
    {
        return $this->belongsTo(Institucion::class, 'institucion_origen_id');
    }

    public function datoComplementario(): HasOne
    {
        return $this->hasOne(DatoComplementario::class);
    }

    public function expedienteFisico(): HasOne
    {
        return $this->hasOne(ExpedienteFisico::class, 'reporte_id');
    }

    public function fusionRegistros(): HasMany
    {
        return $this->hasMany(FusionRegistro::class, 'reporte_id');
    }


}
