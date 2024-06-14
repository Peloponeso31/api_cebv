<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodoCaptura extends Model
{
    public $timestamps = false;

    protected $table = 'metodos_captura';

    protected $fillable = [
        'nombre',
    ];
}
