<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class RelacionVehiculo extends Model
{
    public $timestamps = false;

    protected $table = 'relaciones_vehiculos';

    protected $fillable = [
        'nombre',
    ];
}
