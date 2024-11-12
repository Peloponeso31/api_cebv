<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SituacionMigratoria extends Model
{
    public $timestamps = false;

    protected $table = 'cat_situaciones_migratorias';

    protected $fillable = [
        'nombre',
    ];

    public function contextosSociales(): HasMany
    {
        return $this->hasMany(ContextoSocial::class);
    }

    public function scopeWithSituacionesmigratoriasCount($query)
    {
        return $query->withCount('contextosSociales');
    }
}
