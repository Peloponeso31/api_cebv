<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pasatiempo extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    public function persona(): BelongsToMany
    {
        return $this->belongsToMany(Persona::class);
    }
}
