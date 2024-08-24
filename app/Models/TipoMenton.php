<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoMenton extends Model
{
    public $timestamps = false;

    protected $table = 'cat_tipos_menton';

    protected $fillable = [
        'nombre',
    ];

    public function mediasFiliacionesComplementarias(): HasMany
    {
        return $this->hasMany(MediaFiliacionComplementaria::class);
    }
}
