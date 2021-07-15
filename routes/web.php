<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SuggestController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;
use App\Http\Controllers\Client\AjaxController as ClientAjaxController;
use App\Http\Controllers\Client\CartController as ClientCartController;
use App\Http\Controllers\Client\CategoryController as ClientCategoryController;
use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Client\CommentController as ClientCommentController;
use App\Http\Controllers\Client\UserController as ClientUserController;
use App\Http\Controllers\Client\OrderController as ClientOrderController;
use App\Http\Controllers\Client\SuggestController as ClientSuggestController;
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

Route::group(['middleware' => 'locale'], function () {
    Auth::routes();
    Route::get('change-locale/{locale}', LocaleController::class)->name('locale.change');
    Route::get('/', [ClientHomeController::class, 'index']);
    Route::get('/products/{id}', [ClientProductController::class, 'show'])->name('client.product.show');
    Route::get('/categories/{id}', [ClientCategoryController::class, 'show'])->name('client.category.show');
    Route::get('/filter', [ClientAjaxController::class, 'filter'])->name('client.ajax.filter_product');
    Route::get('/add-to-cart', [ClientAjaxController::class, 'addToCart'])->name('client.ajax.addToCart');
    Route::get('/add-to-cart-multiple', [ClientAjaxController::class, 'addToCartMultiple'])
    ->name('client.ajax.addMultiple');
    Route::get('/carts', [ClientCartController::class, 'index'])->name('client.cart.index');
    Route::get('/remove-item-cart', [ClientAjaxController::class, 'removeItemCart'])
    ->name('client.ajax.remove');
    Route::get('/minus-quantity-item', [ClientAjaxController::class, 'removeQuantityItem'])
    ->name('client.ajax.minus_quantity_item');

    Route::resource('/admin/dashboard', DashboardController::class);

    Route::resource('admin/users', UserController::class);
    Route::patch('/rating-product', [ClientAjaxController::class, 'ratingProduct'])->name('client.ajax.rating');
    Route::post('/comments/{productId}', [ClientCommentController::class, 'postComment'])->name('client.comment.post');
    Route::get('users/{id}', [ClientUserController::class, 'show'])->name('client.user.show');
    Route::patch('users/{id}/update', [ClientUserController::class, 'update'])->name('client.user.update');
    Route::get('users/{id}/password', [ClientUserController::class, 'passwordForm'])->name('client.user.password');
    Route::patch('users/{id}/password/update', [ClientUserController::class, 'changePassword'])
    ->name('client.user.change_password');
    Route::get('/order', [ClientOrderController::class, 'orderHistory'])->name('client.order.history');
    Route::patch('/order-confirm/{id}', [ClientOrderController::class, 'confirmOrder'])->name('client.order.confirm');
    Route::get('/checkout', [ClientOrderController::class, 'show'])->name('client.order.show');
    Route::post('/checkout', [ClientOrderController::class, 'handleOrder'])->name('client.order.handle');
    Route::get('/order-success', [ClientOrderController::class, 'orderSuccess'])->name('client.order.success');
    Route::get('/suggests', [ClientSuggestController::class, 'index'])->name('client.suggest.index');
    Route::post('/suggests', [ClientSuggestController::class, 'handleSuggest'])->name('client.suggest.handle');

    Route::resource('admin/products', ProductController::class);

    Route::resource('admin/orders', OrderController::class);

    Route::get('/admin/orders/change-status-order/{id}', [OrderController::class, 'changeStatus'])
    ->name('orders.change-status');

    Route::resource('admin/categories', CategoryController::class);

    Route::get('admin/categories/{id}/list-product', [CategoryController::class, 'getAllProductByCategoryId'])
    ->name('categories.listProduct');

    Route::resource('admin/suggests', SuggestController::class);

    Route::get('/admin/suggests/change-status-suggest/{id}', [SuggestController::class, 'changeStatus'])
    ->name('suggests.change-status');

    Route::get('export', [ProductController::class, 'export'])->name('products.export');
    Route::get('importExportView', [ProductController::class, 'products.importExportView']);
    Route::post('import', [ProductController::class, 'import'])->name('products.import');
});
