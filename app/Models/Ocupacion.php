<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model
{
    public $timestamps = false;

    protected $table = 'ocupaciones';

    protected $fillable = [
        'nombre',
    ];
}
