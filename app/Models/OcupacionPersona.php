<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OcupacionPersona extends Pivot
{
    public $incrementing = true;

    protected $table = 'ocupacion_persona';

    protected $fillable = [
        'ocupacion_id',
        'persona_id',
        'prioridad',
        'observaciones',
    ];

    public $timestamps = false;

    public function ocupacion(): BelongsTo
    {
        return $this->belongsTo(Ocupacion::class, 'ocupacion_id');
    }

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
}
