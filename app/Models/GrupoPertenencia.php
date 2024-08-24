<?php

namespace App\Models;

use App\Models\Catalogos\PrendaVestir;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GrupoPertenencia extends Model
{
    use HasFactory;

    protected $table = 'cat_grupos_pertenencias';

    protected $fillable = ['nombre'];

    public $timestamps = false;

    public function pertenencia(): HasMany
    {
        return $this->hasMany(Pertenencia::class);
    }
}
