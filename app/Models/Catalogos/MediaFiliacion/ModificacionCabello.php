<?php

namespace App\Models\Catalogos\MediaFiliacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModificacionCabello extends Model
{
    use HasFactory;

    protected $table="modificacion_cabellos";
    protected $fillable=['modificacion_cabello'];
    public $timestamps= true;

    public function persona():HasMany {
        return $this->hasMany(Persona::class);
    }
}
