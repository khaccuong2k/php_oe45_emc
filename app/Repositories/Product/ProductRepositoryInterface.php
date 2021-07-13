<?php

namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
    /**
     * Get hot trend products
     *
     * @param  $column
     * @param  $orderBy
     * @param  $takeNum
     * @return mixed
     */
    public function getHotTrendProducts($column, $orderBy, $takeNum);

    /**
     * Get best seller products
     *
     * @param  $column
     * @param  $orderBy
     * @param  $takeNum
     * @return mixed
     */
    public function getBestSellerProducts($column, $orderBy, $takeNum);

    /**
     * Get recently viewed products
     *
     * @param  $recentlyViewedProductsId
     * @param  $takeNum
     * @return mixed
     */
    public function getRecentlyViewedProducts($recentlyViewedProductsId, $takeNum);

    /**
     * Get products by category id
     *
     * @param  $id
     * @param  $category
     * @param  $paginate
     * @return mixed
     */
    public function getProductsByCategoryId($id, $category, $paginate);

    /**
     * filter products
     *
     * @param  $filterBy
     * @param  $paginate
     * @return mixed
     */
    public function filterProductsFollowCategory($categoryId, $filterBy, $star, $paginateNumber);

    /**
     * Import Product Data For Table Product From Excel, Csv
     *
     * @var object $request
     * @return boolean
     */
    public function import(object $request);

    /**
     * Get all category by product_id
     *
     * @var int $id
     * @return Collection
     */
    public function getAllCategoryByProductId(int $id);

    /**
     * Transaction implement change data product table
     *
     * @var int    $id
     * @var array $request
     * @var string $typeAction
     * @return boolean
     */
    public function transaction(int $id = null, array $request = null, string $typeAction = null);

    /**
     * Return array request for change data product table
     *
     * @var array $request
     * @return array
     */
    public function dataRequest(array $request);
}
