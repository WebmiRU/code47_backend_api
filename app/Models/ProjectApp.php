<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectApp extends Model
{
    protected $table = 'project_app';
    protected $fillable = [
        'key',
        'title',
        'project_id',
    ];


    public function project(): BelongsTo {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
