<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoIntervencionQuirurgica extends Model
{
    public $timestamps = false;

    protected $table = 'cat_tipos_intervencion_quirurgica';

    protected $fillable = [
        'nombre',
    ];

    public function intervencionesQuirurgicas(): HasMany
    {
        return $this->hasMany(IntervencionQuirurgica::class);
    }
}
