<?php

namespace App\Models\Catalogos\Etnia;

use App\Models\Etnia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Religion extends Model
{
    protected $table = 'religiones';

    protected $fillable = ['nombre'];

    public $timestamps = false;


    public function etnia(): HasMany
    {
        return $this->hasMany(Etnia::class);
    }
}
