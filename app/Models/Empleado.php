<?php

namespace App\Models;

use App\Models\Catalogos\Area;
use App\Models\Catalogos\Puesto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        "nombre",
        "apellido_paterno",
        "apellido_materno",
        "fecha_nacimiento",
        "puesto",
        "area",
    ];

    public function usuario():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function Area():BelongsTo{
        return $this->belongsTo(Area::class);
    }

    public function Puesto():BelongsTo{
        return $this->belongsTo(Puesto::class);
    }
}
