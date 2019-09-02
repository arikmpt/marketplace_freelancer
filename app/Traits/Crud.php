<?php

namespace App\Traits;

class Crud {
    
    public function findOne(Model $model, $col = 'id',  $val)
    {
        if($col == 'id') {
            return $model->findOrFail($val);
        }
        return $model->where($col, $val)->firstOrFail();
    }

    public function findMany(Model $model, $col = 'id', $val, $pagination = null, $sort = 'asc')
    {
        if($pagination) 
            return $model->where($col, $val)->orderBy($col,$sort)->paginate($pagination);

        return $model->where($col, $val)->orderBy($col,$sort)->get();
    }

    public function save(Model $model, Array $arr)
    {
        return $model->create($arr);
    }

    public function update(Model $model, $arr, $connection = false, $col = 'id', $val)
    {

        $find = $model->where($col, $val)->firstOrFail();

        foreach($array as $index => $fill) {
                $find[$index] = $array[$index];
        }
        return $find->save();
    }

    public function deleteOne(Model $model, $col = 'id', $val)
    {
        return $model->where($col, $val)->firstOrFail()->delete();
    }

    public function deleteMany(Model $model, $col = 'id', $val) 
    {
        $findMany = $model->where($col, $val)->get()->pluck('id')->toArray();
        foreach ($findMany as $val) {
            $model->findOrFail($val)->delete();
        }

        return true;
    }
}