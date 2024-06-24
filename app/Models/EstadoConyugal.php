<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstadoConyugal extends Model
{
    public $timestamps = false;

    protected $table = 'estados_conyugales';

    protected $fillable = [
        'nombre',
    ];

    public function personas(): HasMany
    {
        return $this->hasMany(Persona::class);
    }
}
