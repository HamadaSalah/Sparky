<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\Emp\AuthController as EmpAuthController;
use App\Http\Controllers\Api\Emp\OrdersController as EmpOrdersController;
use App\Http\Controllers\Api\Emp\RequestController;
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
    Route::post('SendLocation', [OrdersController::class, 'SendLocation']);
    Route::post('BookOrder', [OrdersController::class, 'BookOrder']);
    Route::get('myorders/{id}', [OrdersController::class, 'myorders']);
    Route::post('dis', [OrdersController::class, 'dis']);
    Route::get('order/{id}', [OrdersController::class, 'order']);
    Route::get('NewOrders/{id}', [OrdersController::class, 'NewOrders']);
    Route::get('myordersCurrent/{id}', [OrdersController::class, 'myordersCurrent']);
    Route::get('myordersCompleted/{id}', [OrdersController::class, 'myordersCompleted']);
    Route::get('myordersCanceled/{id}', [OrdersController::class, 'myordersCanceled']);
    Route::get('employeeprofile/{id}', [OrdersController::class, 'employeeprofile']);
});

//APIS
Route::get('allcats', [CategoryController::class, 'allcats']);


///EMLOYEES APIS
Route::group(['middleware' => 'api','prefix' => 'authEmpl'], function ($router) {

    Route::post('login', [EmpAuthController::class, 'login']);
    Route::post('editProfile', [EmpAuthController::class, 'editProfile']);
    Route::post('register', [EmpAuthController::class, 'register']);
    
});
Route::group(['middleware' => 'api','prefix' => 'Employee'], function ($router) {
    Route::get('AllNewOrders', [EmpOrdersController::class, 'AllNewOrders']);
    Route::post('bidRequest', [RequestController::class, 'bidRequest']);
    Route::get('mybids/{id}', [RequestController::class, 'mybids']);
    Route::get('MyCurrentBid/{id}', [RequestController::class, 'MyCurrentBid']);
    Route::get('MyCompletedBid/{id}', [RequestController::class, 'MyCompletedBid']);
    Route::get('MyCanceledBid/{id}', [RequestController::class, 'MyCanceledBid']);
    //new waiting orders
    Route::get('NewEmployeeOrders/{id}', [RequestController::class, 'NewEmployeeOrders']);
    Route::post('ChangeBookStatus', [RequestController::class, 'ChangeBookStatus']);
});

