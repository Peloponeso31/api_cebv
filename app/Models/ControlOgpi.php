<?php

namespace App\Models;

use App\Models\Personas\EstatusPersona;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ControlOgpi extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'reporte_id',
        'estatus_rndpno_id',
        'folio_fub',
        'autoridad_ingresa_fub',
        'fecha_codificacion',
        'nombre_codificador',
        'observaciones',
        'numero_tarjeta',
    ];

    protected $casts = [
        'fecha_codificacion' => 'datetime',
    ];

    public function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class);
    }

    public function estatusRndpno(): BelongsTo
    {
        return $this->belongsTo(EstatusPersona::class, 'estatus_rndpno_id');
    }
}
