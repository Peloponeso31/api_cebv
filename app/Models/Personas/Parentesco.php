<?php

namespace App\Models\Personas;

use App\Models\Reportes\Relaciones\Reportante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Parentesco extends Model
{
    use Searchable;

    protected $table = 'parentescos';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    public function reportantes(): HasMany
    {
        return $this->hasMany(Reportante::class);
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
        ];
    }
}
