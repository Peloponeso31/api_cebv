<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormaOreja extends Model
{
    protected $table = 'formas_orejas';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];
}
