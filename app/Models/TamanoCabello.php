<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TamanoCabello extends Model
{
    public $timestamps = false;

    protected $table = 'tamanos_cabellos';

    protected $fillable = [
        'nombre',
    ];
}
