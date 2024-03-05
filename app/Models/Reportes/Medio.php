<?php

namespace App\Models\Reportes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medio extends Model
{
    protected $table = 'medios';

    public $timestamps = false;

    protected function tipoMedio(): BelongsTo
    {
        return $this->belongsTo(TipoMedio::class);
    }
}
