<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Particular extends Model
{
    public $timestamps = false;

    protected $table = 'particulares';

    protected $fillable = [
        'nombre',
    ];
}
