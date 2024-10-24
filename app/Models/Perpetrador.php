<?php

namespace App\Models;

use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perpetrador extends Model
{
    public $timestamps = false;

    protected $table = 'perpetradores';

    protected $fillable = [
        'nombre',
        'sexo_id',
        'descripcion',
        'estatus_perpetrador_id',
        'reporte_id',
    ];

    public function sexo(): BelongsTo
    {
        return $this->belongsTo(Sexo::class, 'sexo_id');
    }

    public function estatusPerpetrador(): BelongsTo
    {
        return $this->belongsTo(EstatusPerpetrador::class, 'estatus_perpetrador_id');
    }

    public function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }
}
