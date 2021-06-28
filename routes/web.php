<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;
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
 * Route Resource
 * ----------------
 * route for requests
 */
Route::resource('admin/requests', RequestController::class);
