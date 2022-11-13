<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\UserController;
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



Route::middleware('guest:admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'getLogin'])->name('doLogin');
    Route::post('/login', [LoginController::class, 'doLogin'])->name('login');
});
Route::middleware('auth:admin')->name('admin.')->group(function () {
    Route::get('/index', [LoginController::class, 'index'])->name('index');
    Route::resource('/users', UserController::class);
    Route::resource('/employees', EmployeesController::class);
    Route::resource('/orders', OrdersController::class);
    Route::resource('/category', CategoriesController::class);
    Route::post('UpdateUserStatus', [UserController::class, 'UpdateUserStatus'])->name('UpdateUserStatus');
    Route::post('UpdateEmpStatus', [UserController::class, 'UpdateEmpStatus'])->name('UpdateEmpStatus');
    // Route::resource('/clients', ClientController::class);
    // Route::resource('orders', OrdersController::class);
    // Route::resource('countries', CountryController::class);
    // Route::resource('settings', SettingsController::class);
    // Route::resource('dailyworks', DailyWorks::class);
    // Route::post('editStatus/{id}',[OrdersController::class, 'editStatus'])->name('editStatus');
    // Route::post('AddNewPay',[ContractController::class, 'AddNewPay'])->name('AddNewPay');
    // Route::post('EmpPay',[ContractController::class, 'EmpPay'])->name('EmpPay');
    // Route::post('UpdateUserStatus',[UserController::class, 'UpdateUserStatus'])->name('UpdateUserStatus');
    // Route::resource('contract', ContractController::class);
    // Route::get('printuser/{id}',[UserController::class, 'printuser'] )->name('printuser');
    // Route::get('printemp/{id}',[ClientController::class, 'printemp'] )->name('printemp');
 
});
?>
