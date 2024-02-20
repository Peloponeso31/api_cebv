<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dependencia extends Model
{
    protected $table = 'dependencias';

    public $timestamps = false;

    public function desapariciones(): HasMany
    {
        return $this->hasMany(Desaparicion::class);
    }
}
