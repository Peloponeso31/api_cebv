<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Ocupacion extends Model
{
    use Searchable;

    public $timestamps = false;

    protected $table = 'ocupaciones';

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
        return $this->belongsToMany(Persona::class, 'ocupacion_persona');
    }

    public function toSearchableArray(): array
    {
        return [
            'tipo_ocupacion_id' => $this->tipo_ocupacion_id,
        ];
    }

}
