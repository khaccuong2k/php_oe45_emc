<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;

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
        return $this->model->whereIn('id', $recentlyViewedProductsId)->take($takeNum)->get();
    }
}
