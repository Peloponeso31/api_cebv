<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TamanoBoca extends Model
{
    public $timestamps = false;

    protected $table = 'tamanos_bocas';

    protected $fillable = [
        'nombre',
    ];
}
