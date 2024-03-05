<?php

namespace App\Models\Reportes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoMedio extends Model
{
    public $timestamps = false;

    protected $table = 'tipos_medios';



    public function medios(): HasMany
    {
        return $this->hasMany(Medio::class);
    }
}
