<?php

namespace App\Models\Reportes\Hipotesis;

use App\Enums\EtapaHipotesis;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hipotesis extends Model
{

    protected $table = 'hipotesis';

    protected $fillable = [
       'reporte_id',
       'tipo_hipotesis_id',
       'etapa',
    ];

    public $timestamps = false;

    protected $casts = [
        'etapa' => EtapaHipotesis::class
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
        return $this->belongsTo(TipoHipotesis::class, 'tipo_hipotesis_id');
    }
}
