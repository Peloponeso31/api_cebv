<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActionLog extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'action'
    ];

    /**
     * Get the user that owns the action log.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
