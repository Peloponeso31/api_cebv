<?php

namespace App\Models;

use App\Models\Personas\Persona;
use App\Models\Ubicaciones\Direccion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Amistad extends Model
{
    protected $table = 'amistades';

    protected $fillable = [
        'persona_id',
        'tipo_red_social_id',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'apodo',
        'telefono',
        'usuario_red_social',
        'observaciones_red_social',
    ];

    public $timestamps = false;

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function tipoRedSocial(): BelongsTo
    {
        return $this->belongsTo(TipoRedSocial::class, 'tipo_red_social_id');
    }

    public function domicilios(): BelongsToMany
    {
        return $this->belongsToMany(Direccion::class);
    }
}
