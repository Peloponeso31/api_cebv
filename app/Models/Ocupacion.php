<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ocupacion extends Model
{
    public $timestamps = false;

    protected $table = 'cat_ocupaciones';

    protected $fillable = [
        'tipo_ocupacion_id',
        'nombre',
    ];

    public function tipoOcupacion(): BelongsTo
    {
        return $this->belongsTo(TipoOcupacion::class);
    }

    public function personas(): BelongsToMany
    {
        return $this->belongsToMany(Persona::class, 'ocupacion_persona')->using(OcupacionPersona::class);
    }
}
