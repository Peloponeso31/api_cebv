<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CondicionSalud extends Model
{
    public $timestamps = false;

    protected $table = 'condiciones_salud';

    protected $fillable = [
        'nombre',
    ];
}
