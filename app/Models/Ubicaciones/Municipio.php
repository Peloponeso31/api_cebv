<?php

namespace App\Models\Ubicaciones;

use App\Models\Reportes\Relaciones\Desaparecido;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Municipio extends Model
{
    /*
     * We want to use the Searchable trait from Laravel Scout
     */
    use Searchable;

    protected $table = 'municipios';

    /*
     * We don't want the id to be auto-incrementing because it's a string
     */
    public $incrementing = false;

    /*
     * We use a string as the primary key
     */
    protected $keyType = 'string';

    /*
     * We want to allow mass assignment for all the fields
     */
    protected $guarded = [];

    public $timestamps = false;

    /**
     * Get the estado that owns the municipio.
     *
     * @return BelongsTo
     */
    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    /**
     * Get the asentamientos for the municipio.
     *
     * @return HasMany
     */
    public function asentamientos(): HasMany
    {
        return $this->hasMany(Asentamiento::class);
    }

    public function desaparecidos(): HasMany
    {
        return $this->hasMany(Desaparecido::class);
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'estado_id' => $this->estado_id,
            'nombre' => $this->nombre,
        ];
    }
}
