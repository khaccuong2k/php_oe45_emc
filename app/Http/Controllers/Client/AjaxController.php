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
    protected $listItemId;

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
            // Put all product id to resolve to show cart
            $this->pushItemToCart($productsId);
            $cart = Session::get('cart');
            $numberItem = $this->removeDuplicateAndCount($cart);
            // Put number cart to seesion to show
            Session::put('cart-item-number', $numberItem);
            echo $numberItem;
        }
    }

    public function removeItemCart(Request $request)
    {
        $itemId = $request->itemId;
        $listItem = Session::get('cart');
        $listItem = array_diff($listItem, [$itemId]);
        $numberItem = $this->removeDuplicateAndCount($listItem);
        Session::put('cart', $listItem);
        Session::put('cart-item-number', $numberItem);
        echo Session::get('cart-item-number');
    }

    public function removeQuantityItem(Request $request)
    {
        $itemId = $request->itemId;
        $listItemsId = Session::get('cart');
        foreach ($listItemsId as $key => $value) {
            if ($value == $itemId) {
                unset($listItemsId[$key]);
                break;
            }
        }
        Session::put('cart', $listItemsId);
        $numberItem = $this->removeDuplicateAndCount($listItemsId);
        Session::put('cart-item-number', $numberItem);
        echo Session::get('cart-item-number');
    }

    public function addToCartMultiple(Request $request)
    {
        $productsId = $request->listProductId;
        $this->pushItemToCart($productsId);
        $listItem = Session::get('cart');
        $numberItem = $this->removeDuplicateAndCount($listItem);
        Session::put('cart-item-number', $numberItem);
        echo $numberItem;
    }

    public function pushItemToCart(array $array): void
    {
        foreach ($array as $item) {
            Session::push('cart', $item);
        }
    }

    public function removeDuplicateAndCount(array $array): int
    {
        // Remove duplicate products item.
        $removeDuplicateItem = array_unique($array);
        // Get number of all products added has resolved duplicate
        $numberItem = count($removeDuplicateItem);

        return $numberItem;
    }
}
