<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectUserAction extends Pivot
{
    protected $table = 'project_user_action';
    protected $fillable = [
        'project_id',
        'user_id',
        'action_id',
    ];

    public function project(): BelongsTo {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
