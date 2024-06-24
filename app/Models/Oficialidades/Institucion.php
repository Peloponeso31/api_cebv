<?php

namespace App\Models\Oficialidades;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Institucion extends Model
{
    use Searchable;

    public $timestamps = false;

    protected $table = 'instituciones';

    protected $fillable = [
        'descripcion',
        'nombre',
    ];

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
        ];
    }
}
