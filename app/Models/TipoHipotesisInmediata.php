<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoHipotesisInmediata extends Model
{
    public $timestamps = false;

    protected $table = 'tipos_hipotesis_inmediatas';

    protected $fillable = [
        'abreviatura',
        'nombre',
    ];
}
