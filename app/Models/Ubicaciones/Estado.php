<?php

namespace App\Models\Ubicaciones;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estado extends Model
{
    protected $table = 'estados';

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
     * Get the municipios for the estado.
     *
     * @return HasMany
     */
    public function municipios(): HasMany
    {
        return $this->hasMany(Municipio::class);
    }
}
