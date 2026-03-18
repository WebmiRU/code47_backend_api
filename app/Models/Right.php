<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Right extends Model
{
    protected $table = 'right';
    protected $fillable = [
        'key',
        'title',
    ];

    public function group(): BelongsTo {
        return $this->belongsTo(RightGroup::class, 'group_id', 'id');
    }
}
