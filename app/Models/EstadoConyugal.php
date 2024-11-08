<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstadoConyugal extends Model
{
    public $timestamps = false;

    protected $table = 'cat_estados_conyugales';

    protected $fillable = [
        'nombre',
    ];

    public function contextosFamiliares(): HasMany
    {
        return $this->hasMany(ContextoFamiliar::class);
    }

    public function scopeWithEstadosConyugalesCount($query)
    {
        return $query->withCount('contextosFamiliares');
    }
}
