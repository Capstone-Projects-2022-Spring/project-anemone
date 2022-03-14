<?php

use App\Http\Controllers\UserController;
// use App\Http\Controllers\DocumentController;
// use App\Http\Controllers\AnnotationController;
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
Route::get('/', function () {
    return view('checkout-1');
});

Route::get('/index', [IndexController::class, 'index'])->name('index');

Route::get('/checkout-1', [RegisterController::class, 'index'])->name('checkout-1');
Route::post('/checkout-1', [RegisterController::class, 'register_user']);

Auth::routes(['verify' => true]);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'sign_in']);

// HTTP verb responses setup
// Route::httpverb($uri, $callback);

// User endpoint
Route::get('/user', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'create_user']);
Route::post('/user/[]', [UserController::class, 'create_user_array']);
Route::get('/user/login', [UserController::class, 'login']);
Route::get('/user/logout', [UserController::class, 'logout']);
Route::get('/user/{username}', [UserController::class, 'get_username']);
Route::put('/user/{username}', [UserController::class, 'update_user_by_username']);
Route::delete('/user/{username}', [UserController::class, 'delete_user']);

// document endpoint
Route::post('/upload', [DocumentController::class], 'upload');
Route::put('/document', [DocumentController::class, 'update_document']);
Route::get('/document/status', [DocumentController::class, 'find_document_by_status']);
Route::get('/document/{documentId}', [DocumentController::class, 'get_document_by_id']);
Route::delete('/document/{documentId}', [DocumentController::class, 'delete_document_by_id']);
Route::post('/document/[]', [DocumentController::class, 'create_document_list']);

// documents search query endpoint
Route::get('/document/search/{path}', [DocumentController::class, 'search_documents_by_query']);

// annotation endpoint
