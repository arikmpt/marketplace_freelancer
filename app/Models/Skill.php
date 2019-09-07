<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';

    protected $fillable = [
        'name'
    ];

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
        return datatables($this->query())
            ->addIndexColumn()
            ->addColumn('action', 'components.admin.action.ajax')
            ->toJson();
    }
}

