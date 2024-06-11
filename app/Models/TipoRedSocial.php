<?php

namespace App\Models;

use App\Models\Personas\RedesSocial;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TipoRedSocial extends Model
{
    use HasFactory;

    protected $fillable=['nombre'];


    public function redescoialess(): HasOne
    {
        return $this->hasOne(RedesSocial::class);
    }
}
