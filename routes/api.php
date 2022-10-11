<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrdersController;
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
Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('editProfile', [AuthController::class, 'editProfile']);
    Route::post('register', [AuthController::class, 'register']);
    
});
Route::group(['middleware' => 'api'], function ($router) {
    Route::post('AddNewOrder', [OrdersController::class, 'AddNewOrder']);
    Route::get('myorders/{id}', [OrdersController::class, 'myorders']);
    Route::get('order/{id}', [OrdersController::class, 'order']);
    // Route::get('myordersCurrent/{id}', [OrdersController::class, 'myordersCurrent']);
    // Route::get('myordersCompleted/{id}', [OrdersController::class, 'myordersCompleted']);
    // Route::get('myordersCanceled/{id}', [OrdersController::class, 'myordersCanceled']);
});

//APIS
Route::get('allcats', [CategoryController::class, 'allcats']);