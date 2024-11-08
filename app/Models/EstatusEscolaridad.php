<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstatusEscolaridad extends Model
{
    public $timestamps = false;

    protected $table = 'cat_estatus_escolaridades';

    protected $fillable = [
        'nombre',
    ];

    public function estudio(): HasMany
    {
        return $this->hasMany(Estudio::class);
    }

    public function scopeWithEstudiosCount($query)
    {
        return $query->withCount('estudio');
    }
}
