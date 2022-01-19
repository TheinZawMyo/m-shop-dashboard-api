<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [APIController::class, 'register']);
Route::post('/login', [APIController::class, 'login']);

Route::group(['prefix' => 'products'], function(){
    Route::get('/list', [APIController::class, 'productList']);
    Route::get('/detail', [APIController::class, 'productDetail']);
});

Route::middleware('auth:api')->group(function(){
    Route::post('/orders', [APIController::class, 'itemOrder']);
    Route::post('/updateProfile', [APIController::class, 'updateProfile']);
});
