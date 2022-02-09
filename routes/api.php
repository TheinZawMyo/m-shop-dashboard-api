<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\AuthController;

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

Route::get('/auth/google/url', [AuthController::class, 'loginUrl']);
Route::get('/auth/google/callback', [AuthController::class, 'loginCallback']);

Route::group(['prefix' => 'products'], function(){
    Route::get('/detail', [APIController::class, 'productDetail']);
    Route::get('/list', [APIController::class, 'productList']);
});

Route::middleware('auth:api')->group(function(){
    Route::post('/order', [APIController::class, 'itemOrder']);
    Route::get('/user/detail', [APIController::class, 'userDetail']);
    Route::post('/update/profile', [APIController::class, 'updateProfile']);

});
