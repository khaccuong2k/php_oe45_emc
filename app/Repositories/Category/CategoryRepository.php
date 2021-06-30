<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        
        return Category::class;
    }

    public function all()
    {
        $categories = $this->model::with(
            'subCategories'
        )->where(
            'parent_id',
            null
        )->orderBy(
            'id',
            'desc'
        )->paginate(
            config('app.paginate_number')
        );

        return $categories;
    }

    public function getAllProductByCategoryId(int $id)
    {
        $listProduct = $this->model::with('products')
        ->where(
            'id',
            $id
        )->first();
        
        if (($listProduct->products->count()) > 0) {
            return $listProduct;
        }

        return false;
    }

    public function create($request)
    {
        $data = $this->dataRequest($request);
        if ($data !== null) {
            $this->model->create($data);

            $this->handleUploadImage($request);
    
            return true;
        }
        
        return false;
    }

    public function update($request, $id)
    {
        $find = $this->model::findOrFail($id);
        if ($find) {
            $data = $this->dataRequest($request);
            if ($data !== null) {
                $find->update($data);
    
                $this->handleUploadImage($request);
        
                return true;
            }
            
            return false;
        }

        return false;
    }

    public function delete($id)
    {
        $find = $this->findOrFail($id);
        if ($find) {
            $checkHasProduct = $find->products();
            if ($checkHasProduct->count() > 0) {
                return false;
            }
            $find->delete($id);

            return true;
        }

        return false;
    }

    public function dataRequest($request)
    {
        if ($request !== null) {
            return [
                'name' => $request->name,
                'thumbnail' => 'admin-page/files/images/'.$request->thumbnail->getClientOriginalName(),
                'description' => $request->description,
                'parent_id' => $request->parent_id,
            ];
        }

        return null;
    }
}
