<?php

namespace App\Models;  
use App\Models\Catalogos\PrendaDeVestir;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GrupoPertenencia extends Model
{
    use HasFactory;

    protected $table = "grupo_pertenencias";
    protected $fillable = ['nombre'];
    public $timestamps = false;

    public function PrendaDeVestir(): HasMany
    {
        return $this->hasMany(PrendaDeVestir::class);
    }

    public function pertenencia(): HasMany
    {
        return $this->hasMany(Pertenencia::class);
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
        ];
    }
}
