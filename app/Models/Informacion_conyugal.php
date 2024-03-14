<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informacion_conyugal extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_estadocivil',
    ];
}
