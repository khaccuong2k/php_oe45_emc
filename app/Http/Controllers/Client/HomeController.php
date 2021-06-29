<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        $hotTrendProducts = $this->productRepo->getHotTrendProducts(
            'views',
            'DESC',
            config('showitem.hot_trend')
        );
        $bestSellerProducts = $this->productRepo->getBestSellerProducts(
            'sold',
            'DESC',
            config('showitem.best_seller')
        );
        $recentlyViewedProductsId = [];
        array_push($recentlyViewedProductsId, Session::get('products.recently_viewed'));
        $recentlyViewedProducts = $this->productRepo->getRecentlyViewedProducts(
            $recentlyViewedProductsId,
            config('showitem.recently_viewed')
        );
        
        return view(
            'client.home.index',
            compact(
                'hotTrendProducts',
                'bestSellerProducts',
                'recentlyViewedProducts'
            )
        );
    }
}
