<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Project extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    protected $table = 'projects';

    protected $fillable = [
        'title','description','finish_day','published_budget','attachment',
        'is_expire','category_id','user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function skills()
    {
        return $this->hasMany(ProjectSkill::class, 'project_id');
    }

    public function bids()
    {
        return $this->hasMany(ProjectBid::class, 'project_id');
    }

    public function skillsToString()
    {
        $arr = [];
        foreach($this->skills as $skill)
        {
            array_push($arr, $skill->name);
        }

        return $arr;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
