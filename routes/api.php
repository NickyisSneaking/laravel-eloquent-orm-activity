<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\HumanResource;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

//router connect for api
Route::prefix('v1')->group(base_path('routes/api_v1.php'));
Route::post('/toilet', [PayrollController::class, 'toilet']); //may i go to the toilet? yes you may go to the toilet, but please make sure to wash your hands afterwards.
Route::post('/testRun/calculate', [HumanResource::class, 'testRun']);
Route::post('/payment', [HumanResource::class, 'payment']);
Route::apiResource('products', ProductController::class); //api resource for products becarefull of using delete method in the api resource because it will delete the product from the database and you will not be able to recover it. Use with caution.
Route::apiResource('categories', CategoryController::class); //api resource for categories
//grouping the api routes for version 1 of the api, this is to make sure that the api routes are versioned and can be easily maintained in the future.
Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);


Route::post('/', function () {
    return view('welcome');
});
