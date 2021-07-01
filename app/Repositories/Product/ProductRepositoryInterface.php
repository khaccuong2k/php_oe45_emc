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
     * @param $recentlyViewedProductsId
     * @param $takeNum
     * @return mixed
     */
    public function getRecentlyViewedProducts($recentlyViewedProductsId, $takeNum);

    /**
     * Get products by category id
     * @param $id
     * @param $category
     * @param $paginate
     * @return mixed
     */
    public function getProductsByCategoryId($id, $category, $paginate);

    /**
     * filter products
     * @param $filterBy
     * @param $paginate
     * @return mixed
     */
    public function filterProductsFollowCategory($categoryId, $filterBy, $star, $paginateNumber);
}
