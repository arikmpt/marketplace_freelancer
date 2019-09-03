<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DataTables;
use Yajra\DataTables\Html\Builder;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name' , 'slug'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'category_id');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function dataTableSource()
    {
        return DataTables::of($this->query())
            ->addIndexColumn()
            ->toJson();
    }

    public function dataTableHtml(Builder $builder)
    {
        return $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => 'No', 'title' => 'No'],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name']
        ]);
    }
}
