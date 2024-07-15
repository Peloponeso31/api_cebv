<?php

namespace App\Models\Reportes\Hechos;

use App\Models\Reportes\Reporte;
use App\Models\Ubicaciones\Direccion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;

class HechoDesaparicion extends Model
{
    use HasFactory, Searchable;

    protected $table = 'hechos_desapariciones';

    protected $fillable = [
        'reporte_id',
        'direccion_id',
        'fecha_desaparicion',
        'fecha_desaparicion_cebv',
        'fecha_percato',
        'fecha_percato_cebv',
        'aclaraciones_fecha_hechos',
        'cambio_comportamiento',
        'descripcion_cambio_comportamiento',
        'fue_amenazado',
        'descripcion_amenaza',
        'contador_desapariciones',
        'situacion_previa',
        'informacion_relevante',
        'hechos_desaparicion',
        'sintesis_desaparicion',
        'cantidad_desaparecidos',
    ];

    protected $casts = [
        'fecha_desaparicion' => 'datetime',
        'fecha_percato' => 'datetime',
        'cambio_comportamiento' => 'boolean',
        'fue_amenazado' => 'boolean',
    ];

    /**
     * Get the reporte that owns the hecho de desaparicion.
     *
     * @return BelongsTo
     */
    public function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class, "reporte_id");
    }

    public function lugarHechos() : BelongsTo
    {
        return $this->belongsTo(Direccion::class, 'direccion_id');
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            'fecha_desaparicion' => $this->fecha_desaparicion,
            'fecha_percato' => $this->fecha_percato,
            'cambio_comportamiento' => $this->cambio_comportamiento,
            'descripcion_cambio_comportamiento' => $this->descripcion_cambio_comportamiento,
            'fue_amenazado' => $this->fue_amenazado,
            'descripcion_amenaza' => $this->descripcion_amenaza,
            'contador_desapariciones' => $this->contador_desapariciones,
            'situacion_previa' => $this->situacion_previa,
            'informacion_relevante' => $this->informacion_relevante,
            'hechos_desaparicion' => $this->hechos_desaparicion,
            'sintesis_desaparicion' => $this->sintesis_desaparicion,
        ];
    }
}
