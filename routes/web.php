<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
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

Route::get('/', [EmployeeController::class, 'index']);
Route::post('/dashboard', [EmployeeController::class, 'login'])->name('emp#login');

Route::group(['middleware' => 'authCheck'], function(){
    Route::group(['prefix' => 'products'], function(){
        Route::get('/list', [ProductController::class, 'productList'])->name('product#list');
        Route::get('/search', [ProductController::class, 'productSearch'])->name('product#search');
        Route::get('/new', [ProductController::class, 'newProductForm'])->name('new#product');
        Route::post('/save', [ProductController::class, 'saveProduct'])->name('save#product');

        Route::get('/detail/{id}', [ProductController::class, 'getDetail'])->name('product#detail');
        Route::get('/delete/{id}', [ProductController::class, 'deleteItem'])->name('product#delete');
        Route::post('/update/{id}', [ProductController::class, 'updateItem'])->name('update#product');
    });

    Route::group(['prefix' => 'orders'], function(){
        Route::get('/list', [OrderController::class, 'customerList'])->name('customer#list');
        Route::get('/orders', [OrderController::class, 'orderList'])->name('order#list');
    });

    Route::get('/logout', [EmployeeController::class, 'logout'])->name('emp#logout');
});
