<?php

namespace App\Models\Catalogos\Etnia;

use App\Models\Etnia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GrupoEtnico extends Model
{
    use HasFactory;
    protected $table='grupo_etnicos';
    protected $fillable=['grupoetnico'];
    public $timestamps = true;

    public function etnia():HasMany {
        return $this->hasMany(Etnia::class);
    }
}
