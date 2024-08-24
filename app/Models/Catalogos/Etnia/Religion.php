<?php

namespace App\Models\Catalogos\Etnia;

use App\Models\Etnia;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Religion extends Model
{
    protected $table = 'cat_religiones';

    protected $fillable = ['nombre'];

    public $timestamps = false;


    public function etnia(): HasMany
    {
        return $this->hasMany(Etnia::class);
    }

    public function personas(): HasMany
    {
        return $this->hasMany(Persona::class);
    }
}
