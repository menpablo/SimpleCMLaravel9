<?php

namespace App\Traits;

trait CrudTrait
{
    public function save($data = [])
    {
        return $this->model->create($data);
    }

    public function paginate($perPage = 10, $with = [])
    {
        $query = $this->model->query();
        $query->orderBy('id', 'desc');
        if (count($with) > 0) {
            $query->with($with);
        }

        return $query->paginate(10);
    }

    public function getById($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function update($data, $id)
    {
        $model = $this->getById($id);
        $model->update($data);

        return $model;
    }

    public function delete($id)
    {
        $model = $this->getById($id);
        $model->delete();
    }
}
