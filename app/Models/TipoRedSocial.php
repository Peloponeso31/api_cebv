<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoRedSocial extends Model
{
    public $timestamps = false;

    protected $table = 'tipos_redes_sociales';

    protected $fillable = [
        'nombre',
    ];
}
