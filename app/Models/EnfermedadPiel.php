<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnfermedadPiel extends Model
{
    public $timestamps = false;

    protected $table = 'enfermedades_pieles';

    protected $fillable = [
        'nombre',
    ];
}
