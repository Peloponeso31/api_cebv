<?php

namespace App\Models\Catalogos\Etnia;

use App\Models\Etnia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ascendencia extends Model
{
    use HasFactory;
    protected $table='ascendencias';
    protected $fillable=['ascendencia'];
    public $timestamps = true;
     
    public function etnia():HasMany {
        return $this->hasMany(Etnia::class);
    }
}
