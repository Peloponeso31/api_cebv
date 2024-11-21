<?php

namespace App\Models;

use App\Models\Catalogos\CaracteristicasFisicas\TipoNariz;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nariz extends Model
{
    protected $table = 'narices';

    protected $fillable = [
        'persona_id',
        'tipo_nariz_id',
        'especificaciones_nariz',
    ];

    public $timestamps = false;

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function tipoNariz(): BelongsTo
    {
        return $this->belongsTo(TipoNariz::class, 'tipo_nariz_id');
    }
}
