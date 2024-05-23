<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsoVehiculo extends Model
{
    public $timestamps = false;

    protected $table = 'usos_vehiculos';

    protected $fillable = [
        'nombre',
    ];
}
