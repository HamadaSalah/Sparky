<?php

use Illuminate\Support\Facades\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::fallback(function () {
//     if( Request::segment(1) == 'post') {
//         return abort(404);
//         // return redirect()->to('/');
//     }
//     else if(is_numeric(Request::segment(1))) {
//         return redirect()->route('post', rand(1000, 20000));
//     }
//     else {
//         return redirect()->to('/');
//     }
// });