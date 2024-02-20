<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    protected $table = 'areas';

    public $timestamps = false;

    public function desapariciones(): HasMany
    {
        return $this->hasMany(Desaparicion::class);
    }
}
