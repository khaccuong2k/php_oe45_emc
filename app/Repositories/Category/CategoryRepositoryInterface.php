<?php

namespace App\Repositories\Category;


interface CategoryRepositoryInterface
{
    /**
     * Get all product by category_id
     * 
     * @var int $id
     */
    public function getAllProductByCategoryId(int $id);

    /**
     * Get all category is parent category
     * 
     */
    public function getAllCategoryIsParent();

    /**
     * Handle update images to public
     * 
     * @var object $request
     */
    public function handleUploadImage(object $request);
}
