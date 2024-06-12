<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escolaridad extends Model
{
    public $timestamps = false;

    protected $table = 'escolaridades';

    // TODO: Agregar atributos en la pestaña de reportante, seccion escolaridad.
    // TODO: Catalogo de avance de escolaridad en la seccion antes mencionada.
    protected $fillable = [
        'nombre',
    ];
}
