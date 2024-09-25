<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposDomicilio extends Model
{
    protected $fillable = [ "nombre" ];
    public $timestamps = false;
    protected $table = "tipos_domicilios";
}
