<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormaCara extends Model
{
    public $timestamps = false;

    protected $table = 'formas_caras';

    protected $fillable = [
        'nombre',
    ];
}
