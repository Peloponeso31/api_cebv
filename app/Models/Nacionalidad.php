<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Nacionalidad extends Model
{
    use HasFactory;

    protected $table = 'nacionalidades';

    protected $fillable = [
        'nombre'
        
    ];

    public function personas(): BelongsToMany
    {
        return $this->belongsToMany(Persona::class);
    }
}
