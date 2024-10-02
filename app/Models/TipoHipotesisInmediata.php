<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoHipotesisInmediata extends Model
{
    public $timestamps = false;

    protected $table = 'cat_tipos_hipotesis_inmediatas';

    protected $fillable = [
        'nombre',
        'abreviatura',
    ];

    public function localizaciones(): HasMany
    {
        return $this->hasMany(Localizacion::class);
    }
}
