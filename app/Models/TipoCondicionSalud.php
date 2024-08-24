<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoCondicionSalud extends Model
{
    public $timestamps = false;

    protected $table = 'cat_tipos_condiciones_salud';

    protected $fillable = [
        'nombre',
    ];

    public function condicionesSalud(): HasMany
    {
        return $this->hasMany(CondicionSalud::class);
    }
}
