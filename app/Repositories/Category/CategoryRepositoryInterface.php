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
}
