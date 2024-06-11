<?php

namespace App\Models;

use App\Models\Personas\RedesSocial;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RedesSociales_Persona extends Model
{
    use HasFactory;

    protected $fillable=['persona_id',
                         'red_social_id'];

    public function persona(): HasOne
    {
        return $this->hasOne(RedesSociales_Persona::class, 'persona_id');
    }

    public function redessociales(): BelongsTo
    {
        return $this->belongsTo(RedesSocial::class);
    }
}
