<?php

namespace App\Models;

use App\Models\Personas\Persona;
use App\Models\Reportes\Relaciones\Reportante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Colectivo extends Model
{
    public $timestamps = false;

    protected $table = 'cat_colectivos';

    protected $fillable = [
        'nombre',
    ];

    public function reportantes(): HasMany
    {
        return $this->hasMany(Reportante::class);
    }

    public function scopeWithColectivosCount($query)
    {
        return $query->withCount('reportantes');
    }
}
