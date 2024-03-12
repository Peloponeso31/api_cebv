<?php

namespace App\Models\Reportes\Hipotesis;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class TipoHipotesis extends Model
{
    use Searchable;

    protected $table = 'tipos_hipotesis';

    protected $fillable = [
        'circunstancia_id',
        'abreviatura',
        'descripcion',
    ];

    public $timestamps = false;

    /**
     * Get the circunstancia that owns the tipo de hipotesis.
     *
     * @return BelongsTo
     */
    public function circunstancia(): BelongsTo
    {
        return $this->belongsTo(Circunstancia::class, 'circunstancia_id');
    }

    /**
     * Get the hipotesis for the tipo de hipotesis.
     *
     * @return HasMany
     */
    public function hipotesis(): HasMany
    {
        return $this->hasMany(Hipotesis::class);
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'circunstancia_id' => $this->circunstancia_id,
            'abreviatura' => $this->abreviatura,
            'descripcion' => $this->descripcion,
        ];
    }
}
