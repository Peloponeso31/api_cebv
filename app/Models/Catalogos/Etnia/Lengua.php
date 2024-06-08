<?php

namespace App\Models\Catalogos\Etnia;

use App\Models\Etnia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lengua extends Model
{
    protected $table = 'lenguas';

    protected $fillable = ['nombre'];

    public $timestamps = false;

    public function etnia(): HasMany
    {
        return $this->hasMany(Etnia::class);
    }
}
