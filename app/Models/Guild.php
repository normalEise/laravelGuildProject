<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guild extends Model
{
    protected $fillable = [
        'name',
        'server',
        'level'
    ];

    public function members(): HasMany {
        return $this->hasMany(Member::class);
    }
}
