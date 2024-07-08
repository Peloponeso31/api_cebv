<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class GrupoVulnerable extends Model
{
    public $timestamps = false;

    protected $table = 'grupos_vulnerables';

    protected $fillable = [
        'nombre',
    ];

    public function personas(): BelongsToMany
    {
        return $this->belongsToMany(Persona::class, 'grupos_vulnerables_personas');
    }
}
