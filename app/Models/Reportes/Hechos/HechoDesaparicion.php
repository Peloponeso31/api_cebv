<?php

namespace App\Models\Reportes\Hechos;

use App\Enums\FactorRhesus;
use App\Models\Informaciones\Sitio;
use App\Models\Oficialidades\Area;
use App\Models\Reportes\Reporte;
use App\Models\Ubicaciones\Direccion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class HechoDesaparicion extends Model
{
    use HasFactory, Searchable;

    protected $table = 'hechos_desapariciones';

    protected $fillable = [
        'reporte_id',
        'direccion_id',
        'sitio_id',
        'area_asigna_sitio_id',
        'fecha_desaparicion_desconocida',
        'fecha_desaparicion',
        'fecha_desaparicion_cebv',
        'hora_desaparicion',
        'fecha_percato',
        'fecha_percato_cebv',
        'hora_percato',
        'aclaraciones_fecha_hechos',
        'amenaza_cambio_comportamiento',
        'descripcion_amenaza_cambio_comportamiento',
        'contador_desapariciones',
        'situacion_previa',
        'informacion_relevante',
        'hechos_desaparicion',
        'sintesis_desaparicion',
        'desaparecio_acompanado',
        'personas_mismo_evento',
        'contexto_desaparicion',
    ];

    protected $casts = [
        'fecha_desaparicion_desconocida' => 'boolean',
        'fecha_desaparicion' => 'datetime',
        'fecha_percato' => 'datetime',
        'cambio_comportamiento' => 'boolean',
        'fue_amenazado' => 'boolean',
        'resultado_rnd' => FactorRhesus::class,
    ];

    /**
     * Get the reporte that owns the hecho de desaparicion.
     *
     * @return BelongsTo
     */
    public function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }

    public function sitio(): BelongsTo
    {
        return $this->belongsTo(Sitio::class, 'sitio_id');
    }

    public function areaAsignaSitio(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_asigna_sitio_id');
    }

    public function lugarHechos(): BelongsTo
    {
        return $this->belongsTo(Direccion::class, 'direccion_id');
    }

    public function desaparecidos()
    {
        return $this->reporte->desaparecidos;
    }
}
