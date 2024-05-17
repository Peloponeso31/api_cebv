<?php

namespace App\Models\CondicionVulnerabilidad;

use App\Models\CondicionVulnerabilidad\CondicionVulnerabilidad;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sangre extends Model
{
    use HasFactory;

    protected $table = 'sangre';
    public $timestamps = false;

    protected $fillable = [
        'tipo'
    ];

    public function condicion_vulnerabilidad(): BelongsTo
    {
        return $this->belongsTo(CondicionVulnerabilidad::class);
    }
}
