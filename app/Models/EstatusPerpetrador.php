<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstatusPerpetrador extends Model
{
    public $timestamps = false;

    protected $table = 'estatus_perpetradores';

    protected $fillable = [
        'nombre',
    ];
}
