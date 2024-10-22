<?php

namespace App\Models\Personas;

use App\Models\Expediente;
use App\Models\Familiar;
use App\Models\Reportes\Relaciones\Reportante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Parentesco extends Model
{
    use Searchable;

    protected $table = 'cat_parentescos';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    public function reportantes(): HasMany
    {
        return $this->hasMany(Reportante::class);
    }

    public function expedientes(): HasMany
    {
        return $this->hasMany(Expediente::class);
    }

    public function familiares(): HasMany
    {
        return $this->hasMany(Familiar::class);
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
        ];
    }
}
