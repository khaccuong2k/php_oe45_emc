<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;
use App\Http\Controllers\Client\AjaxController as ClientAjaxController;
use App\Http\Controllers\Client\CartController as ClientCartController;
use App\Http\Controllers\Client\CategoryController as ClientCategoryController;
use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/**
 * Route Get Method
 * ----------------
 * route for dashboard
 */
Route::resource('/admin/dashboard', DashboardController::class);

/**
 * Route Resource
 * ----------------
 * route for users
 */
Route::resource('admin/users', UserController::class);

/**
 * Route Resource
 * ----------------
 * route for products
 */
Route::resource('admin/products', ProductController::class);

/**
 * Route Resource
 * ----------------
 * route for orders
 */
Route::resource('admin/orders', OrderController::class);

/**
 * Route Resource
 * ----------------
 * route for categories
 */
Route::resource('admin/categories', CategoryController::class);

/**
 * Route Get
 * ----------------
 * route for get all product off category by category_id
 */
Route::get('admin/categories/{id}/list-product',
            [CategoryController::class, 'getAllProductByCategoryId'])->name('categories.listProduct');

/**
 * Route Resource
 * ----------------
 * route for requests
 */
Route::resource('admin/requests', RequestController::class);

Route::group(['middleware' => 'locale'], function() {
    // Auth::routes();
    Route::get('change-locale/{locale}', LocaleController::class)->name('locale.change');
    Route::get('/', [ClientHomeController::class, 'index']);
    Route::get('/products/{id}', [ClientProductController::class, 'show'])->name('client.product.show');
    Route::get('/categories/{id}', [ClientCategoryController::class, 'show'])->name('client.category.show');
    Route::get('/filter', [ClientAjaxController::class, 'filter'])->name('client.ajax.filter_product');
    Route::get('/add-to-cart', [ClientAjaxController::class, 'addToCart'])->name('client.ajax.addToCart');
    Route::get('/carts', [ClientCartController::class, 'index'])->name('client.cart.index');
});

/**
 * Route import data from file excel and csv
 */
Route::get('export', [ProductController::class, 'export'])->name('products.export');
Route::get('importExportView',  [ProductController::class, 'products.importExportView']);
Route::post('import', [ProductController::class, 'import'])->name('products.import');
