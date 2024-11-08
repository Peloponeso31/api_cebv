<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormaOreja extends Model
{
    protected $table = 'cat_formas_orejas';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    public function orejas(): HasMany
    {
        return $this->hasMany(Oreja::class,'forma_orejas_id');
    }

    public function scopeWithFormasorejasCount($query)
    {
        return $query->withCount('orejas');
    }
}
