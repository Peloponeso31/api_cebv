<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desaparicion extends Model
{
    public $timestamps = false;

    protected $table = 'desapariciones';

    protected $casts = [
        'fecha_desaparicion' => 'datetime',
        'fecha_percato' => 'datetime',
    ];
}
