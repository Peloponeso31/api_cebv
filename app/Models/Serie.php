<?php

namespace App\Models;

use App\Models\Reportes\TipoReporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Serie extends Model
{
    public $timestamps = false;

    protected $table = 'series';

    protected $fillable = [
        'numero',
    ];

    protected function tipoReporte(): BelongsTo
    {
        return $this->belongsTo(TipoReporte::class);
    }
}
