<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContextoSocial extends Model
{
    use HasFactory;

    protected $table = 'contextos_sociales';

    protected $fillable = [
        'persona_id',
        'situacion_migratoria_id',
        'esta_transito_estados_unidos',
        'descripcion_proceso_migratorio',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function situacionMigratoria(): BelongsTo
    {
        return $this->belongsTo(SituacionMigratoria::class, 'situacion_migratoria_id');
    }
}
