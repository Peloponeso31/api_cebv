<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RazonCurp extends Model
{
    protected $fillable = ['nombre'];

    protected $table = 'cat_razones_curp';

    public $timestamps = false;

    public function personas(): HasMany
    {
        return $this->hasMany(Persona::class);
    }
}
