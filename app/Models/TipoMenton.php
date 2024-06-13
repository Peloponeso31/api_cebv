<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoMenton extends Model
{
    public $timestamps = false;

    protected $table = 'tipos_mentones';

    protected $fillable = [
        'nombre',
    ];
}
