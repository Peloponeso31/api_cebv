<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoVehiculo extends Model
{
    public $timestamps = false;

    protected $table = 'tipos_vehiculos';

    protected $fillable = [
        'nombre',
    ];
}
