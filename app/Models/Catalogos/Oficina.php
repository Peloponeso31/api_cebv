<?php

namespace App\Models\Catalogos;

use App\Models\Empleado\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Oficina extends Model
{

     protected $table = 'cat_oficinas';

     protected $fillable = ['nombre'];

     public $timestamps = false;

    public function empleado(): HasMany
    {
        return $this->hasMany(Empleado::class);
    }

    public function scopeWithOficinasCount($query)
    {
        return $query->withCount('empleado');
    }
}
