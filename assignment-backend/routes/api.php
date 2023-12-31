<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [\App\Http\Controllers\AuthController::class,'login']);
Route::post('register', [\App\Http\Controllers\AuthController::class,'register']);
Route::post('update-stock-and-price',[\App\Http\Controllers\ProductController::class,'updateStockAndPrice']);

Route::group(['middleware'=>'api'],function (){
    Route::post('logout', [\App\Http\Controllers\AuthController::class,'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class,'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class,'me']);
});

Route::resource('categories',\App\Http\Controllers\CategoryController::class);
Route::resource('products',\App\Http\Controllers\ProductController::class);




