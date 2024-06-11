<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Escolaridad extends Model
{
    public $timestamps = false;

    protected $table = 'escolaridades';

    protected $fillable = [
        'nombre',
    ];

    public function persona(): HasMany
    {
        return $this->hasMany(Persona::class);
    }
}
