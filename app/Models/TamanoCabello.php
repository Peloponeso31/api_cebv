<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TamanoCabello extends Model
{
    public $timestamps = false;

    protected $table = 'cat_tamanos_cabello';

    protected $fillable = [
        'nombre',
    ];

    public function  mediasFiliaciones(): HasMany
    {
        return $this->hasMany(MediaFiliacion::class);
    }
}
