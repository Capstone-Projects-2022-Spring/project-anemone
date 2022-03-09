<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IndexController;

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
Route::get('/index', [IndexController::class, 'index'])->name('index');

Route::get('/checkout-1', [RegisterController::class, 'index'])->name('checkout-1');
Route::post('/checkout-1', [RegisterController::class, 'register_user']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'sign_in']);

Route::get('/', function () {
    return view('login');
});
