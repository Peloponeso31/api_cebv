<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Nacionalidad extends Model
{
    use Searchable;

    protected $table = 'cat_nacionalidades';

    protected $fillable = [
        'nombre'
    ];

    public function personas(): BelongsToMany
    {
        return $this->belongsToMany(Persona::class, 'nacionalidad_persona');
    }

    public function toSearchableArray(): array
    {
        return [
            'nombre' => $this->nombre,
        ];
    }
}
