<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MediaFiliacionComplementaria extends Model
{
    public $timestamps = false;

    protected $table = 'medias_filiaciones_complementarias';

    protected $fillable = [
        'persona_id',
        'tiene_ausencia_dental',
        'descripcion_ausencia_dental',
        'tiene_tratamiento_dental',
        'descripcion_tratamiento_dental',
        'tipo_menton_id',
        'especificaciones_menton',
        'observaciones_generales',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function tipoMenton(): BelongsTo
    {
        return $this->belongsTo(TipoMenton::class, 'tipo_menton_id');
    }
}
