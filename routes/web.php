<?php

use App\Http\Controllers\Admin\ProductController;
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

Route::resource('admin/products', ProductController::class);

Route::group(['middleware' => 'locale'], function() {
    // Auth::routes();
    Route::get('change-locale/{locale}', LocaleController::class)->name('locale.change');
});
