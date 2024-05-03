<?php

namespace App\Models\Catalogos\MediaFiliacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TamanoBoca extends Model
{
    use HasFactory;

    protected $table="tamano_bocas";
    protected $fillable=['tamano_boca'];
    public $timestamps= true;

    public function persona():HasMany {
        return $this->hasMany(Persona::class);
    }
}
