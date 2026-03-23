<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function apps(): HasMany
    {
        return $this->hasMany(ProjectApp::class, 'project_id', 'id');
    }

//    public function users(): HasMany {
//        return $this->hasMany(User::class, 'project_id', 'id');
//    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'project_user_action', 'project_id', 'user_id')
            ->withPivot('action_id')
            ->using(ProjectUserAction::class);
    }
}
