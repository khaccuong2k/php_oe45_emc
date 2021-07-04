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
        $parentCategory = $this->model::with('subCategories')->where('parent_id', null)->get();

        return $parentCategory;
    }

    public function getAllProductByCategoryId(int $id)
    {
        $listProduct = $this->model::with('products')->where('id', $id)->first();
        if ($listProduct->products->count() > 0) {
            return $listProduct;
        }

        return false;
    }

    public function getAllCategoryIsParent()
    {
        $parentCategory = $this->model::where('parent_id', null)->get();

        return $parentCategory;
    }

    public function create($request)
    {
        $this->handleUploadImage($request);
        
        $this->model->create([
                        'name' => $request->name,
                        'thumbnail' => $request->thumbnail->getClientOriginalName(),
                        'description' => $request->description,
                        'parent_id' => $request->parent_id
                        ]);

        return true;
    }

    public function update($id, $request)
    {
        $find = $this->model::findOrFail($id);
        if ($find) {
            $this->handleUploadImage($request);
            
            $find->update([
                            'name' => $request->name,
                            'thumbnail' => $request->thumbnail->getClientOriginalName(),
                            'description' => $request->description,
                            'parent_id' => $request->parent_id
                          ]);

            return true;
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
}
