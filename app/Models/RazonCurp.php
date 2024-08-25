<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RazonCurp extends Model
{
    protected $fillable = ['nombre'];

    protected $table = 'cat_razones_curp';

    public $timestamps = false;
}
