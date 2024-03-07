<?php

namespace App\Models\Reportes\Hipotesis;

use App\Models\Reportes\Area;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hipotesis extends Model
{
    protected $table = 'hipotesis';

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
}
