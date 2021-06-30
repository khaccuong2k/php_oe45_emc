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

    /**
     * Get all product by category_id
     */
    public function getAllProductByCategoryId(int $id)
    {
        $listProduct = $this->model::with('products')->where('id', $id)->first();
        if ($listProduct->products->count() > 0) {
            return $listProduct;
        }

        return false;
    }

    /**
     * Get add category and category parent by category_id
     * 
     */
    public function getAllCategoryIsParent()
    {
        $parentCategory = $this->model::where('parent_id', null)->get();

        return $parentCategory;
    }

    /**
     * Edit category
     * 
     * @var int $id
     * @var array $attributes
     * @return bool|mixed
     */
    public function createCategory($attributes)
    {
        $this->handleUploadImage($attributes);
        
        $this->model->create([
                        'name' => $attributes->name,
                        'thumbnail' => $attributes->thumbnail->getClientOriginalName(),
                        'description' => $attributes->description,
                        'parent_id' => $attributes->parent_id
                        ]);

        return true;
    }

    /**
     * Edit category
     * 
     * @var int $id
     * @var array $attributes
     * @return bool|mixed
     */
    public function updateCategory($id, $attributes)
    {
        $find = $this->model::findOrFail($id);
        if ($find) {
            $this->handleUploadImage($attributes);
            
            $find->update([
                            'name' => $attributes->name,
                            'thumbnail' => $attributes->thumbnail->getClientOriginalName(),
                            'description' => $attributes->description,
                            'parent_id' => $attributes->parent_id
                          ]);

            return true;
        }

        return false;
    }

    /**
     * Delete category
     * 
     * @var int $id
     */
    public function deleteCategory($id)
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

    /**
     * Handle update images to public
     * 
     * @var object $request
     */
    public function handleUploadImage(object $request)
    {
        $image = $request->file('thumbnail');
        
        $image->move(public_path('admin-page/files/images'), time().$image->getClientOriginalName());
    }
}
