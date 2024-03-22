<?php

namespace App\Models\Catalogos;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Puesto extends Model
{
    use HasFactory;
    public function empleado():HasMany {
        return $this->hasMany(Empleado::class);
    }
}
