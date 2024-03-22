<?php

namespace App\Models\Oficialidades;

use App\Models\Personas\Persona;
use App\Models\Reportes\Reporte;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Folio extends Model
{
    protected $table = 'folios';

    public $timestamps = false;

    protected function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    protected function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }

    protected function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
