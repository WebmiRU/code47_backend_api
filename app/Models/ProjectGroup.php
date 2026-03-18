<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectGroup extends Model
{
    protected $table = 'project_group';
    protected $fillable = [
        'key',
        'title',
    ];
}
