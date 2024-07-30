<?php

namespace App\Models\Catalogos;

use App\Models\Empleado\Empleado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Puesto extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function empleado():HasMany {
        return $this->hasMany(Empleado::class);
    }
}
