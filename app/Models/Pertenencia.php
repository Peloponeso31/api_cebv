<?php

namespace App\Models;

use App\Models\Catalogos\PrendaDeVestir;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pertenencia extends Model
{
    use HasFactory;

    protected $table = "pertenencias";
    protected $fillable = [
       'nombre'
    ];
    public $timestamps = false;

    public function PrendaDeVestir(): HasMany
    {
        return $this->hasMany(PrendaDeVestir::class);
    }

}
