<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IntervencionQuirurgica extends Model
{
    public $timestamps = false;

    protected $table = 'intervenciones_quirurgicas';

    protected $fillable = [
        'nombre',
    ];
}
