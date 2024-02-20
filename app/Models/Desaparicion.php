<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Desaparicion extends Model
{
    protected $table = 'desapariciones';

    public $timestamps = false;

    protected $casts = [
        'fecha_desaparicion' => 'datetime',
        'fecha_percato' => 'datetime',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function dependencia(): BelongsTo
    {
        return $this->belongsTo(Dependencia::class, 'dependencia_id');
    }

    public function ubicacion(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'ubicacion_id');
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
