<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class CompaniaTelefonica extends Model
{
    use HasFactory,Searchable;

    protected $table = 'companias_telefonicas';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    public function telefono(): HasMany
    {
        return $this->hasMany(Telefono::class);
    }

    public function toSearchableArray(): array
    {
        
        return [
            'id'=> $this -> id,
            'nombre'=> $this -> nombre,
        ];
    }
   


}
