<?php

namespace App\Models;

use App\Enums\TipoExpediente;
use App\Models\Personas\Parentesco;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Expediente extends Pivot
{
    public $incrementing = true;

    protected $table = 'expedientes';

    public $timestamps = false;

    protected $fillable = [
        'reporte_uno_id',
        'reporte_dos_id',
        'parentesco_id',
        'tipo',
    ];

    protected $casts = [
        'tipo' => TipoExpediente::class,
    ];

    public function parentesco(): BelongsTo
    {
        return $this->belongsTo(Parentesco::class, 'parentesco_id');
    }
}
