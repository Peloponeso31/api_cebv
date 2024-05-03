<?php

namespace App\Models\Catalogos\MediaFiliacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoCalvicie extends Model
{
    use HasFactory;

    protected $table="tipo_calvicies";
    protected $fillable=['tipo_calvicie'];
    public $timestamps= true;

    public function persona():HasMany {
        return $this->hasMany(Persona::class);
    }
}
