<?php

namespace App\Models;

use App\Models\Personas\Persona;
use App\Models\Reportes\Relaciones\Desaparecido;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function desaparecidos(): HasMany
    {
        return $this->hasMany(Desaparecido::class);
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
