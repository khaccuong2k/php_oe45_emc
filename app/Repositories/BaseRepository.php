<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

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
     *
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
     *
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Get by id
     *
     * @param  int   $id
     * @return mixed
     */
    public function findOrFail($id)
    {
        try {
            $find = $this->model->findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            Log::debug("Id not found");

            return false;
        }

        return $find;
    }

    /**
     * Create
     *
     * @param  array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update
     *
     * @param  $id
     * @param  array $attributes
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
     *
     * @param  int $id
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
     *
     * @param  null $colum
     * @param  null $orderBy
     * @param  null $paginate
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

    /**
     * Handle update images to public
     *
     * @var array $request
     */
    public function handleUploadImage(array $request = null)
    {
        if ($request !== null) {
            if (is_array($request)) {
                foreach ($request as $key => $img) {
                    $request[$key]->move(
                        public_path('admin-page/files/images'),
                        $request[$key]->getClientOriginalName()
                    );
                }

                return true;
            }
            $request->move(
                public_path('admin-page/files/images'),
                $request->getClientOriginalName()
            );

            return true;
        }

        return true;
    }
}
