<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RedSocial extends Model
{
    public $timestamps = false;

    protected $table = 'redes_sociales';

    protected $fillable = [
        'persona_id',
        'tipo_red_social_id',
        'usuario',
        'observaciones',
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }

    public function tipoRedSocial(): BelongsTo
    {
        return $this->belongsTo(TipoRedSocial::class);
    }
}
