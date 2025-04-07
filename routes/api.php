<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CartController;

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\LoginController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//category
Route::get('/categories',[CategoryController::class,'index']);
ROute::middleware('auth:sanctum')->group(function(){
    Route::post('/category/store', [CategoryController::class,'store']);
    Route::put('/category/update/{id}',[CategoryController::class,'update']);
    Route::delete('/category/delete',[CategoryController::class,'destroy']);

    //cart
Route::get('/cart',[CartController::class,'index']);
Route::post('/cart/store',[CartController::class,'store']);
});


//product
Route::get('/latestproduct',[ProductController::class,'latest']);
Route::get('/viewproduct/{id}',[ProductController::class,'viewproduct']);
Route::post('/product/store', [ProductController::class,'store']);




//login
Route::post('/login',[LoginController::class,'login']);
