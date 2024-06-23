<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedioCaptura extends Model
{
    public $timestamps = false;

    protected $table = 'medios_captura';

    protected $fillable = [
        'nombre',
    ];
}
