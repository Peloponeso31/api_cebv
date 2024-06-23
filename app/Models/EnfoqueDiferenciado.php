<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnfoqueDiferenciado extends Model
{
    public $timestamps = false;

    protected $table = 'enfoques_diferenciados';

    protected $fillable = [
        'nombre',
    ];
}
