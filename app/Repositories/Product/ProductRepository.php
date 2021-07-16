<?php

namespace App\Repositories\Product;

use App\Imports\ProductsImport;
use App\Models\Product;
use App\Repositories\BaseRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }

    public function getHotTrendProducts($column, $orderBy, $takeNum)
    {
        return $this->model->orderBy($column, $orderBy)->take($takeNum)->get();
    }

    public function getBestSellerProducts($column, $orderBy, $takeNum)
    {
        return $this->model->orderBy($column, $orderBy)->take($takeNum)->get();
    }

    public function getRecentlyViewedProducts($recentlyViewedProductsId, $takeNum)
    {
        $getDataType = gettype($recentlyViewedProductsId);
        if ($getDataType === config('showitem.data_type.array')) {
            return $this->model->whereIn('id', $recentlyViewedProductsId)->take($takeNum)->get();
        } else {
            return $this->model->where('id', $recentlyViewedProductsId)->take($takeNum)->get();
        }
    }

    public function getProductsByCategoryId($id, $category, $paginate)
    {
        $arr_id_sub_cagtegory = [];
        if (sizeof($category->products) > config('showitem.count_sub_category')) {
            foreach ($category->products as $subCategories) {
                array_push($arr_id_sub_cagtegory, $subCategories->id);
            }

            return Product::whereIn('category_id', $arr_id_sub_cagtegory)->paginate($paginate);
        } else {
            return Product::where('category_id', '=', $id)->paginate($paginate);
        }
    }

    public function filterProductsFollowCategory($categoryId, $filterBy, $star, $paginateNumber)
    {
        switch ($filterBy) {
            case config('showitem.filter_by.price_asc'):
                $products = Product::where(
                    'category_id',
                    $categoryId
                )->orderBy(
                    'price',
                    'ASC'
                )->paginate($paginateNumber);
                break;
            case config('showitem.filter_by.price_desc'):
                $products = Product::where(
                    'category_id',
                    $categoryId
                )->orderBy(
                    'price',
                    'DESC'
                )->paginate($paginateNumber);
                break;
            case config('showitem.filter_by.name_a_z'):
                $products = Product::where(
                    'category_id',
                    $categoryId
                )->orderBy(
                    'name',
                    'ASC'
                )->paginate($paginateNumber);
                break;
            case config('showitem.filter_by.name_z_a'):
                $products = Product::where(
                    'category_id',
                    $categoryId
                )->orderBy(
                    'name',
                    'DESC'
                )->paginate($paginateNumber);
                break;
            case config('showitem.filter_by.oldest'):
                $products = Product::where(
                    'category_id',
                    $categoryId
                )->orderBy(
                    'id',
                    'ASC'
                )->paginate($paginateNumber);
                break;
            case config('showitem.filter_by.newest'):
                $products = Product::where(
                    'category_id',
                    $categoryId
                )->orderBy(
                    'id',
                    'DESC'
                )->paginate($paginateNumber);
                break;
            case config('showitem.filter_by.star'):
                if ($star == config('showitem.stars.zero')) {
                    $products = Product::where(
                        [
                            ['category_id', $categoryId],
                            ['products.number_of_vote_submission', 0]
                        ]
                    )->orderBy('id', 'DESC')->paginate($paginateNumber);
                } else {
                    if ($star == config('showitem.stars.five')) {
                        $lessStar = $star - config('showitem.minus_one');
                    } else {
                        $lessStar = $star;
                    }
                    $products = Product::where(
                        [
                            ['category_id', $categoryId],
                            [DB::raw('(products.number_of_vote_submissions / products.total_vote)'),'>=', $lessStar],
                            [DB::raw('(products.number_of_vote_submissions / products.total_vote)'),'<=', $star]
                        ]
                    )->orderBy('id', 'DESC')->paginate($paginateNumber);
                }
                break;
            default:
                abort(404);
        }
        
        return $products;
    }

    /**
     * @return \Illuminate\Support\Collection
     * @return boolean
     */
    public function import($request)
    {
        $file = $request->file('file');
        $importFile = Excel::import(new ProductsImport, $file);
        if ($importFile) {
            return true;
        }
 
        return false;
    }

    public function getAllCategoryByProductId(int $id)
    {
        $find = $this->findOrFail($id);
        if ($find) {
            $categoryByProductId = $this->model::with('categories')->findOrFail($id);

            return $categoryByProductId;
        }
        
        return false;
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $find = $this->findOrFail($id);
            if ($find) {
                $find->categories()->detach();
                $find->delete();

                DB::commit();

                return true;
            }

            return false;
        } catch (Exception $e) {
            DB::rollBack();
            
            return false;
        }
    }

    public function create(array $attributes)
    {
        DB::beginTransaction();
        try {
            $data = $this->dataRequest($attributes);
            if ($data !== null) {
                $create = $this->model->create($data);

                $create->categories()->sync($attributes['parent_id']);

                DB::commit();

                $this->handleUploadImage($attributes, 'thumbnail');

                return true;
            }

            return false;
        } catch (Exception $e) {
            DB::rollBack();
            
            return false;
        }
    }

    public function update($id, array $attributes)
    {
        DB::beginTransaction();
        try {
            $find = $this->findOrFail($id);
            if ($find) {
                $data = $this->dataRequest($attributes);
                if ($data !== null) {
                    $find->update($data);

                    $find->categories()->sync($attributes['parent_id']);

                    DB::commit();

                    $this->handleUploadImage($attributes, 'thumbnail');

                    return true;
                }

                return false;
            }
            
            return false;
        } catch (Exception $e) {
            DB::rollBack();
            
            return false;
        }
    }

    public function dataRequest($request)
    {
        if ($request !== null) {
            // Array image request
            $listImageRequest = [];
            foreach ($request['thumbnail'] as $thumbnail) {
                // Add name of file to array image request
                $listImageRequest[] = 'admin-page/files/images/'.$thumbnail->getClientOriginalName();
            }
            // Change type array of $listImageRequest to string
            $imageToUpload = implode(',', $listImageRequest);
            return [
                'name' => $request['name'],
                'thumbnail' => $imageToUpload,
                'content' => $request['content'],
                'quantity' => $request['quantity'],
                'price' => $request['price'],
                'short_description' => $request['short_description'],
            ];
        }

        return null;
    }
    
    public function relatedProducts($categoriesId)
    {
        $categoriesId = implode(',', $categoriesId);

        return Product::with('categories')->whereIn('id', [$categoriesId])->take(config('showitem.related'))->get();
    }
}
