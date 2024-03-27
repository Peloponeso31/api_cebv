<?php

namespace App\Models\Catalogos;

use App\Models\Etnia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lengua extends Model
{
    use HasFactory;
    protected $table='lenguas';
    protected $fillable=['lengua'];
    public $timestamps= true;

    public function etnia():HasMany {
        return $this->hasMany(Etnia::class);
    }
}
