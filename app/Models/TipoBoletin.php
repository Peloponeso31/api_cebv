<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoBoletin extends Model
{
    public $timestamps = false;

    protected $table = 'cat_tipos_boletines';

    protected $fillable = [
        'nombre',
    ];
}
