<?php

namespace App\Models\Oficialidades;

use App\Models\Personas\Persona;
use App\Models\Reportes\Reporte;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Folio extends Model
{
    use Searchable;

    protected $table = 'folios';

    protected $fillable = [
        'folio',
        'persona_id',
        'reporte_id',
        'user_id',
    ];

    public $timestamps = false;

    protected function folio(): Attribute
    {
        return Attribute::make(
            get: fn($value, array $attributes) => $value,
            set: fn($value) => $value['fecha_registro'] . '/' . $value ['tipo_reporte'] .
            $value ['tipo_desaparicion'] . $value['zona_estado'],
        );
    }


    protected function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    protected function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }

    protected function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'folio' => $this->folio,
            'persona_id' => $this->persona_id,
            'reporte_id' => $this->reporte_id,
            'user_id' => $this->user_id,
        ];
    }

}
