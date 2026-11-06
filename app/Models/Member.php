<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    protected $fillable = [
        'guild_id',
        'username',
        'level',
        'role',
        'contributionPoints'
    ];


    public function guild(): BelongsTo {
        return $this->belongsTo(Guild::class);
    }
}
