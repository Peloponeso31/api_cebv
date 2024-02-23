<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hipotesis extends Model
{
    protected $table = 'hipotesis';

    public $timestamps = false;

    public function desapariciones(): HasMany
    {
        return $this->hasMany(Desaparicion::class);
    }
}
