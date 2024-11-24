<?php

namespace App\Models;

use App\Enums\OpcionesCebv;
use App\Models\Catalogos\CaracteristicasFisicas\ColorPiel;
use App\Models\Catalogos\CaracteristicasFisicas\Complexion;
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
        'complexion_id',
        'color_piel_id',
        'forma_cara_id',
        'estatura_centimetros',
        'peso_kilogramos',
        'factor_rhesus',
    ];

    protected $casts = [
        'factor_rhesus' => OpcionesCebv::class,
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function tipoSangre(): BelongsTo
    {
        return $this->belongsTo(TipoSangre::class, 'tipo_sangre_id');
    }

    public function complexion(): BelongsTo
    {
        return $this->belongsTo(Complexion::class, 'complexion_id');
    }

    public function colorPiel(): BelongsTo
    {
        return $this->belongsTo(ColorPiel::class, 'color_piel_id');
    }

    public function formaCara(): BelongsTo
    {
        return $this->belongsTo(FormaCara::class, 'forma_cara_id');
    }
}
