<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AjaxController extends Controller
{

    protected $categoryRepo;
    protected $productRepo;

    public function __construct(
        CategoryRepositoryInterface $categoryRepo,
        ProductRepositoryInterface $productRepo
    ) {
        $this->categoryRepo = $categoryRepo;
        $this->productRepo = $productRepo;
    }

    public function filter(Request $request)
    {
        $response = "";
        $productsCategory = "";
        $categoryId = $request->categoryId;
        $filterName = $request->filterName;
        $stars = $request->stars;
        $paginateNumber = config('showitem.paginate_category');
        if ($filterName == config('showitem.filter_by.name_a_z') ||
            $filterName == config('showitem.filter_by.name_z_a') ||
            $filterName == config('showitem.filter_by.price_asc') ||
            $filterName == config('showitem.filter_by.price_desc') ||
            $filterName == config('showitem.filter_by.oldest') ||
            $filterName == config('showitem.filter_by.newest') ||
            $filterName == config('showitem.filter_by.star')
        ) {
            $products = $this->productRepo->filterProductsFollowCategory(
                $categoryId,
                $filterName,
                $stars,
                $paginateNumber
            );
            $addToCart = trans('message.add_to_cart');
            $newArrival = trans('message.new_arrival');
            renderAjaxHTML($response, $productsCategory, $products, $newArrival, $addToCart);
        }
        echo $response;
    }

    public function addToCart(Request $request)
    {
        // Get id products added to cart
        $productsId = $request->productsId;

        if (isset($productsId)) {
            // Remove duplicate products item.
            $removeDuplicateItem = array_unique($productsId);
            // Get number of all products added has resolved duplicate
            $numberItem = count($removeDuplicateItem);
            // Put number cart to seesion to show
            Session::put('cart-item-number', $numberItem);
            // Put all product id to resolve to show cart
            Session::put('cart', $productsId);
            echo $numberItem;
        }
    }
}
