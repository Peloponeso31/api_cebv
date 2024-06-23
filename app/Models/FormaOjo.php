<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormaOjo extends Model
{
    public $timestamps = false;

    protected $table = 'formas_ojos';

    protected $fillable = [
        'nombre',
    ];
}
