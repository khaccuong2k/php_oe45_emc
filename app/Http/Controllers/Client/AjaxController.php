<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    protected $categoryRepo;
    protected $productRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo, ProductRepositoryInterface $productRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->productRepo = $productRepo;
    }

    public function filter(Request $request)
    {
        $response = "";
        $productsCategory = "";
        $categoryId = $request->categoryId;
        $filterName = $request->filterName;
        $relationship = 'products';
        $paginateNumber = config('showitem.paginate_category');
        $category = $this->categoryRepo->findOrFail($categoryId);
        if ($filterName == config('showitem.filter_by.name_a_z') ||
            $filterName == config('showitem.filter_by.name_z_a') ||
            $filterName == config('showitem.filter_by.price_asc') ||
            $filterName == config('showitem.filter_by.price_desc') ||
            $filterName == config('showitem.filter_by.oldest') ||
            $filterName == config('showitem.filter_by.newest') 
        ) {
            $products = $this->productRepo->filterProductsFollowCategory($categoryId, $filterName, $paginateNumber);
            $addToCart = trans('message.add_to_cart');
            $newArrival = trans('message.new_arrival');
            renderAjaxHTML($response, $productsCategory, $products, $newArrival, $addToCart);
        }
          echo $response;
        }
}
