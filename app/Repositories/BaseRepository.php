<?php

namespace App\Repositories;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    /**
     * BaseRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Get model
     * @return mixed
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get all
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Get by id
     * @param $id
     * @return mixed
     */
    public function findOrFail($id)
    {
        $result = $this->model->findOrFail($id);
        if ($result->count() > 0) {
            return $result;
        }

        return false;
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $find = $this->findOrFail($id);
        if ($find) {
            $find->update($attributes);

            return true;
        }

        return false;
    }

    /**
     * Delete
     * @param $id
     * @return bool|mixed
     */
    public function delete($id)
    {
        $find = $this->findOrFail($id);
        if ($find) {
            $find->delete();

            return true;
        }

        return false;
    }

    /**
     * Order by and paginate
     * @param null $colum
     * @param null $orderBy
     * @param $paginate
     * @return mixed
     */
    public function paginate($colum = null, $orderBy = null, $paginate = null)
    {
        if ($colum != null && $orderBy != null) {
            return $this->model->orderBy($colum, $orderBy)->paginate($paginate);
        }

        return $this->model->paginate($paginate);
    }

    public function orderBy($colum, $orderBy)
    {
        return $this->model->orderBy($colum, $orderBy)->get();
    }
}
