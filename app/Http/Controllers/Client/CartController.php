<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        if (Session::get('cart')) {
            // Get all id product current user added to cart
            $productsIdAdded = Session::get('cart');
            // Broken it to array as id_product => number_added
            $brokenProductAndQuantity = array_count_values($productsIdAdded);
            // Handing data and return all id product and all id product => number_added
            $cartData = handingProductAndQuantity($brokenProductAndQuantity);
            $listIdProductsCart = $cartData['item'];
            // Get all product added to cart
            $productsCart = Product::whereIn('id', $listIdProductsCart)->paginate(config('showitem.cart_item'));

            return view('client.carts.cart', compact('productsCart'));
        }

        return view('client.carts.cart');
    }
}
