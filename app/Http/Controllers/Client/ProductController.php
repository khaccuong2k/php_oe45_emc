<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function show($id)
    {
        // whenever view single product, it will be add to session
        Session::push('products.recently_viewed', $id);
        $productData = $this->productRepo->findOrFail($id);
        $categoriesId = [];
        foreach ($productData->categories as $category) {
            array_push($categoriesId, $category->id);
        }
        $relatedProducts = $this->productRepo->relatedProducts($categoriesId);

        return view('client.products.index', compact('productData', 'relatedProducts'));
    }
}
