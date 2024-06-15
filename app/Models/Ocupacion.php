<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function toSearchableArray(): array
    {
        return [
            'tipo_ocupacion_id' => $this->tipo_ocupacion_id,
        ];
    }

}
