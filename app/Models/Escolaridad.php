<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escolaridad extends Model
{
    public $timestamps = false;

    protected $table = 'escolaridades';

    protected $fillable = [
        'nombre',
    ];
}
