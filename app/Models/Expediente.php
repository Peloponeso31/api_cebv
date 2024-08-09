<?php

namespace App\Models;

use App\Enums\TipoExpediente;
use App\Models\Personas\Parentesco;
use App\Models\Personas\Persona;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expediente extends Model
{
    protected $table = 'expedientes';

    public $timestamps = false;

    protected $fillable = [
        'reporte_id',
        'persona_id',
        'parentesco_id',
        'tipo',
    ];

    protected $casts = [
        'tipo' => TipoExpediente::class,
    ];

    public function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function parentesco(): BelongsTo
    {
        return $this->belongsTo(Parentesco::class, 'parentesco_id');
    }
}
