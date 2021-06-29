<?php 

namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
    /**
     * Get hot trend products
     * @param $column
     * @param $orderBy
     * @param $takeNum
     * @return mixed
     */
    public function getHotTrendProducts($column, $orderBy, $takeNum);

    /**
     * Get best seller products
     * @param $column
     * @param $orderBy
     * @param $takeNum
     * @return mixed
     */
    public function getBestSellerProducts($column, $orderBy, $takeNum);

    /**
     * Get recently viewed products
     * @param $column
     * @param $orderBy
     * @param $takeNum
     * @return mixed
     */
    public function getRecentlyViewedProducts($recentlyViewedProductsId, $takeNum);
}
