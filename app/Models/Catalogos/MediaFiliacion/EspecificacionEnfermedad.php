<?php

namespace App\Models\Catalogos\MediaFiliacion;

use App\Models\MediaFiliacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EspecificacionEnfermedad extends Model
{
    use HasFactory;

    protected $table="especificacion_enfermedads";
    protected $fillable=['Especificacionenfermedad'];
    public $timestamps= true;

    public function media_filiacion():HasMany {
        return $this->hasMany(MediaFiliacion::class);
    }
}
