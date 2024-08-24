<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoEnfermedadPiel extends Model
{
    public $timestamps = false;

    protected $table = 'cat_tipos_enfermedades_piel';

    protected $fillable = [
        'nombre',
    ];

    public function enferdadesPiel(): HasMany
    {
        return $this->hasMany(EnfermedadPiel::class);
    }
}
