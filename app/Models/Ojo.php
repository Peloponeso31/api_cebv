<?php

namespace App\Models;

use App\Models\Catalogos\CaracteristicasFisicas\ColorOjos;
use App\Models\Catalogos\CaracteristicasFisicas\TamanoOjos;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ojo extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'persona_id',
        'color_ojos_id',
        'forma_ojos_id',
        'tamano_ojos_id',
        'especificaciones_ojos',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function colorOjos(): BelongsTo
    {
        return $this->belongsTo(ColorOjos::class, 'color_ojos_id');
    }

    public function formaOjos(): BelongsTo
    {
        return $this->belongsTo(FormaOjo::class, 'forma_ojos_id');
    }

    public function tamanoOjos(): BelongsTo
    {
        return $this->belongsTo(TamanoOjos::class, 'tamano_ojos_id');
    }
}
