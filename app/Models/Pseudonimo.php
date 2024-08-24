<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pseudonimo extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'persona_id',
        'nombre',
        'apellido_paterno',
        'apellido_materno'
    ];

    protected $table = 'pseudonimos';

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
}
