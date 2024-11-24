<?php

namespace App\Models;

use App\Enums\OpcionesCebv;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GeneracionDocumento extends Model
{
    protected $fillable = [
        'reporte_id',
        'medio_difusion_id',
        'resultado_rnd',
        'firma_ausencia',
        'numero_rastreo',
    ];

    protected $casts = [
        'resultado_rnd' => OpcionesCebv::class,
        'firma_ausencia' => 'boolean'
    ];

    protected $table = 'generacion_documentos';

    public function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }

    public function medioDifusion(): BelongsTo
    {
        return $this->belongsTo(MedioDifusion::class, 'medio_difusion_id', 'gd_medio_difusion_id_foreign');
    }
}
