<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Escolaridad extends Model
{
    public $timestamps = false;

    protected $table = 'escolaridades';

    // TODO: Agregar atributos en la pestaña de reportante, seccion escolaridad.
    // TODO: Catalogo de avance de escolaridad en la seccion antes mencionada.
    protected $fillable = [
        'nombre',
    ];

    public function personas(): HasMany
    {
        return $this->hasMany(Persona::class);
    }
}
