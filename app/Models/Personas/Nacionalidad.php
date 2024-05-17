<?php

namespace App\Models\Personas;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Nacionalidad extends Model
{
    use HasFactory;

    protected $table = 'nacionalidades';
    public $timestamps = false;

    protected $fillable = [
        'nombre'
    ];

    public function personas(): BelongsToMany
    {
        return $this->belongsToMany(Persona::class);
    }
}
