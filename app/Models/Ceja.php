<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ceja extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];
}
