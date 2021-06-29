<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function show($id)
    {
        // whenever view single product, it will be add to session
        Session::push('products.recently_viewed', $id);
    }
}
