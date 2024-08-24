<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormaCara extends Model
{
    public $timestamps = false;

    protected $table = 'cat_formas_caras';

    protected $fillable = [
        'nombre',
    ];

    public function mediasFiliaciones(): HasMany
    {
        return $this->hasMany(MediaFiliacion::class);
    }
}
