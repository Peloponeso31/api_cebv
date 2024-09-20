<?php

namespace App\Models\Ubicaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Asentamiento extends Model
{
    /*
     * Add the Searchable trait to the model for full text search
     */
    use Searchable;

    protected $table = 'cat_asentamientos';

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
     * Get the municipio that owns the asentamiento.
     *
     * @return BelongsTo
     */
    public function municipio(): BelongsTo
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }

    /**
     * Get the direcciones for the asentamiento.
     *
     * @return HasMany
     */
    public function direcciones(): HasMany
    {
        return $this->hasMany(Direccion::class);
    }

    public function toSearchableArray()
    {
        return [
            'municipio_id' => $this->municipio_id,
        ];
    }
}
