<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Action extends Model
{
    protected $table = 'action';
    protected $fillable = [
        'key',
        'title',
    ];

    public function group(): BelongsTo {
        return $this->belongsTo(ActionGroup::class, 'group_id', 'id');
    }
}
