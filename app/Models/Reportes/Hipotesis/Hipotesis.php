<?php

namespace App\Models\Reportes\Hipotesis;

use App\Models\Reportes\Informacion\Area;
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
        'area_id',
        'fecha_localizacion',
        'sintesis_localizacion',
        'circunstancia_uno_id',
        'hipotesis_uno',
        'circunstancia_dos_id',
        'hipotesis_dos',
        'sitio_final',
        'tipo_hipotesis_id',
        'observaciones',
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
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }

    /**
     * Get the area que codifica la informacion that owns the hipotesis.
     *
     * @return BelongsTo
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    /**
     * Get the circunstancia that owns the hipotesis.
     *
     * @return BelongsTo
     */
    public function circunstanciaUno(): BelongsTo
    {
        return $this->belongsTo(Circunstancia::class, 'circunstancia_uno_id');
    }

    public function circunstanciaDos(): BelongsTo
    {
        return $this->belongsTo(Circunstancia::class, 'circunstancia_dos_id');
    }

    /**
     * Get the tipo de hipotesis that owns the hipotesis.
     *
     * @return BelongsTo
     */
    public function tipoHipotesis(): BelongsTo
    {
        return $this->belongsTo(TipoHipotesis::class, 'tipo_hipotesis_id');
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            'area_id' => $this->area_id,
            'fecha_localizacion' => $this->fecha_localizacion,
            'sintesis_localizacion' => $this->sintesis_localizacion,
            'circunstancia_uno_id' => $this->circunstancia_uno_id,
            'hipotesis_uno' => $this->hipotesis_uno,
            'circunstancia_dos_id' => $this->circunstancia_dos_id,
            'hipotesis_dos' => $this->hipotesis_dos,
            'sitio_final' => $this->sitio_final,
            'tipo_hipotesis_id' => $this->tipo_hipotesis_id,
            'observaciones' => $this->observaciones,
        ];
    }
}
