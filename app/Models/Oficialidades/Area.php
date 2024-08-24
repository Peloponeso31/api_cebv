<?php

namespace App\Models\Oficialidades;

use App\Models\Reportes\Hipotesis\Hipotesis;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Area extends Model
{
    use Searchable;

    protected $table = 'cat_areas';

    protected $fillable = ['nombre'];

    public $timestamps = false;

    /**
     * Get the reportes for the area.
     *
     * @return HasMany
     */
    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class);
    }

    /**
     * Get the hipotesis for the area.
     *
     * @return HasMany
     */
    public function hipotesis(): HasMany
    {
        return $this->hasMany(Hipotesis::class);
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id
        ];
    }
}
