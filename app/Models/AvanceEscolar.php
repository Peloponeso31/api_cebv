<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvanceEscolar extends Model
{
    public $timestamps = false;

    protected $table = 'avance_escolars';

    protected $fillable = [
        'nombre', 
    ];
}
