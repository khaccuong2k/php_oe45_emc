<?php

use App\Http\Controllers\Admin\ProductController;
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

     // Test view 
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
});

Route::resource('admin/products', ProductController::class);

// Structure test, will delete when done push static page
/**
*@extends('admin.layouts.app')

*@section('title')

*@endsection

*@section('css')

*@endsection

*@section('content')

*@endsection

*@section('script')

*@endsection


*{{ asset('admin-page/
*') }}
*/
