<?php

namespace App\Models\Catalogos\MediaFiliacion;

use App\Models\MediaFiliacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AusenciaDientes extends Model
{
    use HasFactory;

    protected $table="ausencia_dientes";
    protected $fillable=['AusenciaDientes'];
    public $timestamps= true;

    public function media_filiacion():HasMany {
        return $this->hasMany(MediaFiliacion::class);
    }
}
