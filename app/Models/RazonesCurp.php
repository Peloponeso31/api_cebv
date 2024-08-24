<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RazonesCurp extends Model
{
    use HasFactory;

    protected $fillable = ["nombre"];
    protected $table = "razones_curp";
    public $timestamps = false;
}
