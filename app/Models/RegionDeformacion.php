<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegionDeformacion extends Model
{
    public $timestamps = false;

    protected $table = 'regiones_deformaciones';

    protected $fillable = [
        'nombre',
    ];
}
