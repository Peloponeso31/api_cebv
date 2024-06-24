<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoSangre extends Model
{
    public $timestamps = false;

    protected $table = 'tipos_sangre';

    protected $fillable = [
        'nombre',
    ];
}
