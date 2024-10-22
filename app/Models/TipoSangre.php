<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoSangre extends Model
{
    public $timestamps = false;

    protected $table = 'cat_tipos_sangre';

    protected $fillable = [
        'nombre',
    ];

    public function salud(): HasMany
    {
        return $this->hasMany(Salud::class);
    }
}
