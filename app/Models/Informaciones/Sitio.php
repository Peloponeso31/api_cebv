<?php

namespace App\Models\Informaciones;

use App\Models\Reportes\Hipotesis\Hipotesis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Sitio extends Model
{
    use Searchable;

    public $timestamps = false;

    protected $table = 'sitios';

    protected $fillable = [
        'nombre',
    ];

    public function hipotesis(): HasMany
    {
        return $this->HasMany(Hipotesis::class, 'sitio_id');
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
        ];
    }
}
