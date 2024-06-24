<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SituacionMigratoria extends Model
{
    public $timestamps = false;

    protected $table = 'situaciones_migratorias';

    protected $fillable = [
        'nombre',
    ];
}
