<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;

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
    });
    Route::get('/logout', [EmployeeController::class, 'logout'])->name('emp#logout');
});
