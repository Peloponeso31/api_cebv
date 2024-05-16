<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoConyugal extends Model
{
    public $timestamps = false;

    protected $table = 'estados_conyugales';

    protected $fillable = [
        'nombre',
    ];
}
