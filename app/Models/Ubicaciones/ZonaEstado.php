<?php

namespace App\Models\Ubicaciones;

use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class ZonaEstado extends Model
{
    use Searchable;

    public $timestamps = false;

    protected $table = 'zonas_estados';

    protected $fillable = [
        'nombre',
        'abreviatura',
    ];

    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class);
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'abreviatura' => $this->abreviatura,
        ];
    }
}
