<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories1\Product\ProductRepositoryInterface;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }

    
}