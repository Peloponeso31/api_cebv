<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pasatiempo extends Model
{
    protected $table = 'cat_pasatiempos';

    protected $fillable = [
        'nombre',
    ];

    public $timestamps = false;

    public function persona(): BelongsToMany
    {
        return $this->belongsToMany(Persona::class)->using(PasatiempoPersona::class);
    }

    public function scopeWithPasatiemposCount($query)
    {
        return $query->withCount('persona');
    }
}
