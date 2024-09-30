<?php

namespace App\Models;

use App\Models\Reportes\Reporte;
use App\Models\Ubicaciones\Direccion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DatoComplementario extends Model
{
    public $timestamps = false;

    protected $table = 'datos_complementarios';

    protected $fillable = [
        'reporte_id',
        'direccion_id',
    ];

    public function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }

    public function direccion(): BelongsTo
    {
        return $this->belongsTo(Direccion::class, 'direccion_id');
    }
}
