<?php

namespace App\Models\Catalogos;

use App\Models\Empleado\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Puesto extends Model
{
    public $timestamps = false;

    protected $table = 'cat_puestos';

    protected $fillable = [
        'nombre',
    ];

    public function empleado(): HasMany
    {
        return $this->hasMany(Empleado::class);
    }
}
