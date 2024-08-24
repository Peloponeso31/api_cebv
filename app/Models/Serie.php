<?php

namespace App\Models;

use App\Models\Reportes\TipoReporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Serie extends Model
{
    public $timestamps = false;

    protected $table = 'series';

    protected $fillable = ['tipo_reporte_id'];

    protected function tipoReporte(): BelongsTo
    {
        return $this->belongsTo(TipoReporte::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($serie) {
            $lastNumber = Serie::where('tipo_reporte_id', $serie->tipo_reporte_id)->orderByDesc('id')->value('numero');
            $serie->numero = $lastNumber ? $lastNumber + 1 : 1;
        });
    }
}
