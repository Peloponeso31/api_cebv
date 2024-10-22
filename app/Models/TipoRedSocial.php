<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoRedSocial extends Model
{
    public $timestamps = false;

    protected $table = 'cat_tipos_redes_sociales';

    protected $fillable = [
        'nombre',
    ];

    public function personas(): HasMany
    {
        return $this->hasMany(Persona::class);
    }

    public function amistades(): HasMany
    {
        return $this->hasMany(Amistad::class);
    }
}
