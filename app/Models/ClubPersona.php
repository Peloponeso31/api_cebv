<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ClubPersona extends Pivot
{
    public $incrementing = true;

    protected $table = 'club_persona';

    protected $fillable = [
        'club_id',
        'persona_id',
    ];

    public $timestamps = false;

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class, 'club_id');
    }

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
}
