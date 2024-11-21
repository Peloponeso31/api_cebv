<?php

namespace App\Models;

use App\Models\Personas\Persona;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FusionRegistro extends Model
{
    // TODO: Terminar esto
    public $incrementing = true;

    protected $table = 'fusiones_registros';

    protected $fillable = [
        'reporte_id',
        'persona_uno_id',
        'persona_dos_id',
    ];

    public $timestamps = false;

    public function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }

    public function personaUno(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_uno_id');
    }

    public function personaDos(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_dos_id');
    }
}
