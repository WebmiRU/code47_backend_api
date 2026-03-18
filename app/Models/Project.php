<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $table = 'project';
    protected $fillable = [
        'key',
        'title',
        'group_id',
    ];

    public function group(): BelongsTo {
        return $this->belongsTo(ProjectGroup::class, 'group_id', 'id');
    }
}
