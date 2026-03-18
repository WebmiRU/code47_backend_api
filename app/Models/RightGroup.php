<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RightGroup extends Model
{
    protected $table = 'right_group';
    protected $fillable = [
        'key',
        'title',
    ];

    public function rights(): HasMany {
        return $this->hasMany(Right::class, 'group_id', 'id');
    }
}
