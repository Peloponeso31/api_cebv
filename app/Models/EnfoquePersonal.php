<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EnfoquePersonal extends Pivot
{
    public $incrementing = true;

    protected $table = 'persona_tipo_enfoque_diferenciado';

    public $timestamps = false;

    protected $fillable = [
        'tipo_enfoque_diferenciado_id',
        'persona_id',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function tipoEnfoqueDiferenciado(): BelongsTo
    {
        return $this->belongsTo(TipoEnfoqueDiferenciado::class, 'tipo_enfoque_diferenciado_id');
    }
}
