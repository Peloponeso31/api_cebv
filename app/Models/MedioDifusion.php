<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MedioDifusion extends Model
{
    protected $fillable = [
        'nombre'
    ];

    protected $table = 'cat_medios_difusion';

    public $timestamps = false;

    public function generacionDocumentos(): HasMany
    {
        return $this->hasMany(GeneracionDocumento::class);
    }
}
