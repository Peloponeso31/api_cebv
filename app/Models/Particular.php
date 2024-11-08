<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Particular extends Model
{
    public $timestamps = false;

    protected $table = 'cat_particulares';

    protected $fillable = [
        'nombre',
    ];

    public function desaparicionesForzadas(): HasMany
    {
        return $this->hasMany(DesaparicionForzada::class);
    }

    public function scopeWithParticularesCount($query)
    {
        return $query->withCount('desaparicionesForzadas');
    }
}
