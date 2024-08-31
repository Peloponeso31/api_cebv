<?php

namespace App\Models\Ubicaciones;

use App\Models\Personas\Persona;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Estado extends Model
{
    /**
     * Add the Searchable trait to the model for full text search
     */
    use Searchable;

    protected $table = 'cat_estados';

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

    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class);
    }

    public function personas(): HasMany
    {
        return $this->hasMany(Persona::class);
    }

    /**
     * Customize the data that is indexed by Scout for the full text search
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'abreviatura_inegi' => $this->abreviatura_inegi,
            'abreviatura_cebv' => $this->abreviatura_cebv,
        ];
    }
}
