<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectSkill extends Model
{
    protected $table = 'project_skills';

    protected $fillable = [
        'name','project_id'
    ];

    
}
