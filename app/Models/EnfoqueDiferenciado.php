<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnfoqueDiferenciado extends Model
{
    public $timestamps = false;

    protected $table = 'enfoques_diferenciados';

    protected $fillable = [
        'persona_id',
        'pertenencia_grupal_etnica',
        'descripcion_vulnerabilidad',
        'informacion_relevante_busqueda',
    ];

    protected $casts = [
        'pertenencia_grupal_etnica' => 'boolean',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
}
