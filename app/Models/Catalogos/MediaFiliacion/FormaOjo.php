<?php

namespace App\Models\Catalogos\MediaFiliacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaOjo extends Model
{
    use HasFactory;

    protected $table = "forma_ojos";
    protected $fillable = ['forma_ojo'];
    public $timestamps = false;

    public function persona(): HasMany {
        return $this->hasMany(Persona::class);
    }
}
