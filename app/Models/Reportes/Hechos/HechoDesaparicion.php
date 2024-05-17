<?php

namespace App\Models\Reportes\Hechos;

use App\Models\Reportes\Reporte;
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
        'fecha_desaparicion',
        'fecha_percato',
        'cambio_comportamiento',
        'descripcion_cambio_comportamiento',
        'fue_amenazado',
        'descripcion_amenaza',
        'contador_desapariciones',
        'situacion_previa',
        'informacion_relevante',
        'hechos_desaparicion',
        'sintesis_desaparicion',
        'reporte_id',
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
    public function reportes(): BelongsTo
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
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
