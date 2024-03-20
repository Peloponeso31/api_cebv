<?php

namespace App\Models\Personas;

use App\Models\Reportes\Relaciones\Reportante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parentesco extends Model
{
    protected $table = 'parentescos';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    public function reportantes(): HasMany
    {
        return $this->hasMany(Reportante::class);
    }
}
