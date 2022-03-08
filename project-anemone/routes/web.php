<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/checkout-1', [RegisterController::class, 'index'])->name('checkout-1');
Route::post('/checkout-1', [RegisterController::class, 'register_user']);

Route::get('/', function () {
    return view('index');
});
