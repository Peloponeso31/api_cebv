<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VelloFacial extends Model
{
    protected $table = 'vellos_faciales';

    protected $fillable = [
        'persona_id',
        'cejas_id',
        'especificaciones_cejas',
        'tiene_bigote',
        'especificaciones_bigote',
        'tiene_barba',
        'especificaciones_barba',
    ];

    public $timestamps = false;

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function cejas(): BelongsTo
    {
        return $this->belongsTo(Ceja::class, 'cejas_id');
    }
}
