<?php

namespace App\Models\Personas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ocupacion extends Model
{
    public $timestamps = false;

    protected $table = 'ocupaciones';

    protected $fillable = [
        'nombre', 
    ];

    public function persona(): HasOne
    {
        return $this->hasOne(Persona::class, 'ocupacion_id');
    }
}
