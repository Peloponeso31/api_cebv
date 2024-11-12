<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormaCara extends Model
{
    public $timestamps = false;

    protected $table = 'cat_formas_caras';

    protected $fillable = [
        'nombre',
    ];

    public function salud(): HasMany
    {
        return $this->hasMany(Salud::class);
    }

    public function scopeWithFormascaraCount($query)
    {
        return $query->withCount('salud');
    }
}
