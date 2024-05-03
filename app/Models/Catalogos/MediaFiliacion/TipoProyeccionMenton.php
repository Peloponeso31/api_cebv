<?php

namespace App\Models\Catalogos\MediaFiliacion;

use App\Models\Catalogos\ProyeccionMenton;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoProyeccionMenton extends Model
{

    use HasFactory;

    protected $table = "tipo_proyeccion_mentons";
    protected $fillable = ['tipoProyeccionMenton'];
    public $timestamps = false;

    public function ProyeccionMenton(): HasMany {
        return $this->hasMany(VelloFacial::class);
    }
}
