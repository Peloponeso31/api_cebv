<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Escolaridad extends Model
{
    public $timestamps = false;

    protected $table = 'cat_escolaridades';

    protected $fillable = [
        'nombre',
    ];

    public function estudio(): HasMany
    {
        return $this->hasMany(Estudio::class);
    }

    public function scopeWithEscolaridadesCount($query)
    {
        return $query->withCount('estudio');
    }
}
