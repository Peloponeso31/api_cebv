<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TipoEnfoqueDiferenciado extends Model
{
    public $timestamps = false;

    protected $table = 'cat_tipo_enfoque_diferenciados';

    protected $fillable = [
        'nombre',
    ];

    public function personas(): BelongsToMany
    {
        return $this->belongsToMany(Persona::class)
            ->using(EnfoquePersonal::class);
    }

    public function scopeWithTiposenfoquesdif($query)
    {
        return $query->withCount('personas');
    }
}
