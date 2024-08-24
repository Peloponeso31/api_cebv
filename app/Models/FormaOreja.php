<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormaOreja extends Model
{
    protected $table = 'cat_formas_orejas';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    public function mediasFiliaciones(): HasMany
    {
        return $this->hasMany(MediaFiliacion::class);
    }
}
