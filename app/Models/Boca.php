<?php

namespace App\Models;

use App\Models\Catalogos\CaracteristicasFisicas\TipoLabios;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Boca extends Model
{
    protected $table = 'bocas';

    protected $fillable = [
        'persona_id',
        'tamano_boca_id',
        'tamano_labios_id',
        'especificaciones_boca',
    ];

    public $timestamps = false;

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function tamanoBoca(): BelongsTo
    {
        return $this->belongsTo(TamanoBoca::class, 'tamano_boca_id');
    }

    public function tamanoLabios(): BelongsTo
    {
        return $this->belongsTo(TipoLabios::class, 'tamano_labios_id');
    }
}
