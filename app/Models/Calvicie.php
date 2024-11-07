<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Calvicie extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    protected $table = 'cat_calvicies';

    public function cabellos(): HasMany
    {
        return $this->hasMany(Cabello::class);
    }

    public function scopeWithCalviciesCount($query)
    {
        return $query->withCount('cabellos');
    }
}
