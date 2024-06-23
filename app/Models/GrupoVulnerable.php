<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoVulnerable extends Model
{
    public $timestamps = false;

    protected $table = 'grupos_vulnerables';

    protected $fillable = [
        'nombre',
    ];
}
