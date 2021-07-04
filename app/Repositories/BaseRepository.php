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

    public function all()
    {
        return $this->model->all();
    }

    public function findOrFail($id)
    {
        $result = $this->model->findOrFail($id);
        if ($result->count() > 0) {
            return $result;
        }

        return false;
    }

    public function create($request)
    {
        return $this->model->create($request);
    }

    public function update($request, $id)
    {
        $find = $this->findOrFail($id);
        if ($find) {
            $find->update($request);

            return true;
        }

        return false;
    }

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
     * @param null $colum
     * @param null $orderBy
     * @param null $paginate
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

    public function handleUploadImage(object $request = null)
    {
        if ($request !== null) {
            $image = $request->file('thumbnail');
            if (is_array($image)) {
                foreach ($image as $key => $img)
                {
                    $image[$key]->move(public_path('admin-page/files/images'), time().$image[$key]->getClientOriginalName());
                }
    
                return true;
            }
    
            $image[0]->move(public_path('admin-page/files/images'), time().$image[0]->getClientOriginalName());
    
            return true;
        }

        return true;
    }
}
