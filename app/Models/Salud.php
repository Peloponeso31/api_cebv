<?php

namespace App\Models;

use App\Enums\FactorRhesus;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Salud extends Model
{
    public $timestamps = false;

    protected $table = 'salud';

    protected $fillable = [
        'persona_id',
        'tipo_sangre_id',
        'factor_rhesus',
    ];

    protected $casts = [
        'factor_rhesus' => FactorRhesus::class,
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function tipoSangre(): BelongsTo
    {
        return $this->belongsTo(TipoSangre::class, 'tipo_sangre_id');
    }
}
