<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelEscolaridad extends Model
{
    public $timestamps = false;

    protected $table = 'nivel_escolaridads';

    protected $fillable = [
        'nombre', 
    ];
}
