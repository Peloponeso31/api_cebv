<?php

namespace App\Models\Informaciones;

use App\Models\Localizacion;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sitio extends Model
{
    public $timestamps = false;

    protected $table = 'cat_sitios';

    protected $fillable = [
        'nombre',
    ];

    public function hechosDesaparicion(): HasMany
    {
        return $this->hasMany(HechoDesaparicion::class);
    }

    public function localizaciones(): HasMany
    {
        return $this->hasMany(Localizacion::class);
    }

    public function scopeWithSitiosCount($query)
    {
        return $query->withCount('hechosDesaparicion');
    }
}
