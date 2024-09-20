<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormaOjo extends Model
{
    public $timestamps = false;

    protected $table = 'cat_formas_ojos';

    protected $fillable = [
        'nombre',
    ];

    public function ojos(): HasMany
    {
        return $this->hasMany(Ojo::class);
    }
}
