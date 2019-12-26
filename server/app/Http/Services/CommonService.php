<?php

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CommonService
{
    public function get(
        EloquentModel $model,
        array $where = [],
        array $with = [],
        array $select = []
    ): EloquentCollection {
        return $model->select($select)->where($where)->with($with)->get();
    }

    public function find(EloquentModel $model, int $id, array $with = [], array $select = []): EloquentModel
    {
        $modelObject =  $model->with($with)->find($id);
        $classBaseName = class_basename($model);
        throw_if(!$modelObject, new ModelNotFoundException("$classBaseName not found."));

        return $modelObject;
    }

    public function save(EloquentModel $model, array $attributes, int $model_id = null)
    {
        $modelObject = $model_id ? ($model->exists ? $model : $this->find($model, $model_id)) : $model;

        $modelObject->fill($attributes)->save();

        return $modelObject->fresh();
    }

    public function saveMany(EloquentModel $model, array $attributes)
    {
        return $model->insertGetId($attributes);
    }
}
