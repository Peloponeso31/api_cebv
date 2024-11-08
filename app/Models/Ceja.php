<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ceja extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    protected $table = 'cat_cejas';


    public function vellosFaciales(): HasMany
    {
        return $this->hasMany(VelloFacial::class,'cejas_id');
    }

    public function scopeWithTiposcejasCount($query)
    {
        return $query->withCount('vellosFaciales');
    }
}
