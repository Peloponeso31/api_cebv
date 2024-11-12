<?php

namespace App\Models\Oficialidades;

use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Institucion extends Model
{
    use Searchable;

    public $timestamps = false;

    protected $table = 'cat_instituciones';

    protected $fillable = [
        'descripcion',
        'nombre',
    ];

    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class,'institucion_origen_id');
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
        ];
    }
}
