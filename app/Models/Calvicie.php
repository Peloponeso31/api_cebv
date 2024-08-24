<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Calvicie extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    protected $table = 'cat_calvicies';

    public function mediasFiliaciones(): HasMany
    {
        return $this->hasMany(MediaFiliacion::class);
    }
}
