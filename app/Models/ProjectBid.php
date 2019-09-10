<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectBid extends Model
{
    protected $table = 'project_bids';

    protected $fillable = [
        'price','description','user_id','project_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
