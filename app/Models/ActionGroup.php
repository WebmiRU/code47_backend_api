<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ActionGroup extends Model
{
    protected $table = 'action_group';
    protected $fillable = [
        'key',
        'title',
    ];

    public function actions(): HasMany {
        return $this->hasMany(Action::class, 'group_id', 'id');
    }
}
