<?php

namespace App\Models;

use App\Models\Personas\Parentesco;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Familiar extends Model
{
    public $timestamps = false;

    protected $table = 'familiares';

    protected $fillable = [
        'persona_id',
        'parentesco_id',
        'nombre',
        'ha_ejercido_violencia',
        'es_familiar_cercano',
        'observaciones',
    ];

    protected $casts = [
        'ha_ejercido_violencia' => 'boolean',
        'es_familiar_cercano' => 'boolean',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function parentesco(): BelongsTo
    {
        return $this->belongsTo(Parentesco::class, 'parentesco_id');
    }
}
