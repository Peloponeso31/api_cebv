<?php

namespace App\Models\Catalogos;

use App\Models\Etnia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Religion extends Model
{
    use HasFactory;

    protected $table='religions';
    protected $fillable=['religion'];
    protected $timestamps= true;


    public function etnia():HasMany {
        return $this->hasMany(Etnia::class);
    }
}
