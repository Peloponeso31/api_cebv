<?php

namespace App\Models;

use App\Models\Oficialidades\Area;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExpedienteFisico extends Model
{
    public $timestamps = false;

    protected $table = 'expedientes_fisicos';

    protected $fillable = [
        'reporte_id',
        'area_receptora_id',
        'solicitante_expediente_id',
        'fecha_cambio_area',
        'fecha_prestamo',
        'fecha_devolucion',
        'observaciones',
    ];

    protected $casts = [
        'fecha_cambio_area' => 'datetime',
        'fecha_prestamo' => 'datetime',
        'fecha_devolucion' => 'datetime',
    ];

    public function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_receptora_id');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'solicitante_expediente_id');
    }
}
