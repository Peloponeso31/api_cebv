<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnfermedadPiel extends Model
{
    public $timestamps = false;

    protected $table = 'enfermedades_piel';

    protected $fillable = [
        'persona_id',
        'tipo_enfermedad_piel_id',
        'descripcion',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function tipoEnfermedadPiel(): BelongsTo
    {
        return $this->belongsTo(TipoEnfermedadPiel::class, 'tipo_enfermedad_piel_id');
    }
}
