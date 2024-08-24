<?php

namespace App\Models;

use App\Models\Personas\Persona;
use App\Models\Ubicaciones\Direccion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estudio extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'persona_id',
        'escolaridad_id',
        'estatus_escolaridad_id',
        'direccion_id',
        'nombre_institucion',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function escolaridad(): BelongsTo
    {
        return $this->belongsTo(Escolaridad::class, 'escolaridad_id');
    }

    public function estatusEscolaridad(): BelongsTo
    {
        return $this->belongsTo(EstatusEscolaridad::class, 'estatus_escolaridad_id');
    }

    public function direccion(): BelongsTo
    {
        return $this->belongsTo(Direccion::class, 'direccion_id');
    }
}
