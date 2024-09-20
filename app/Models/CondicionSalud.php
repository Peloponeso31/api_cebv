<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CondicionSalud extends Model
{
    public $timestamps = false;

    protected $table = 'condiciones_salud';

    protected $fillable = [
        'persona_id',
        'tipo_condicion_salud_id',
        'indole_salud',
        'tratamiento',
        'observaciones',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function tipoCondicionSalud(): BelongsTo
    {
        return $this->belongsTo(TipoCondicionSalud::class, 'tipo_condicion_salud_id');
    }
}
