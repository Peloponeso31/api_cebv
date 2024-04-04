<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContextoSocial extends Model
{
    use HasFactory;

    protected $fillable = [
        'persona_id',
        "pasatiempos",
        "club_organizacion",
        "estudio",
        "amistades",
        "amistades_municipio",
        "correo_electronico",
        "nombre_redes_sociales",
        "lugares_frecuentes",
        "vivienda_estado"
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }
}
