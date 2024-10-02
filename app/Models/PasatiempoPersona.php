<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PasatiempoPersona extends Pivot
{
    public $incrementing = true;

    protected $table = 'pasatiempo_persona';

    protected $fillable = [
        'pasatiempo_id',
        'persona_id',
    ];

    public $timestamps = false;

    public function pasatiempo(): BelongsTo
    {
        return $this->belongsTo(Pasatiempo::class, 'pasatiempo_id');
    }

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
}
