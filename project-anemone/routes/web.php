<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('submit-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('checkout-1', [AuthController::class, 'registration'])->name('checkout-1');
Route::post('submit-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

///////////
// Route::get('/', function () {
//     return view('dashboard');
// });
///////////
// HTTP verb responses setup
// Route::httpverb($uri, $callback);

// User endpoint
Route::get('/user', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'create_user']);
Route::post('/user/[]', [UserController::class, 'create_user_array']);
Route::get('/user/login', [UserController::class, 'login']);
Route::get('/user/login', [UserController::class, 'login']);
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

// shared link result endpoint



//Route::get('/dashboard', 'UserController@dashboard');
//Route::get('/dashboard', [UserController::class, 'index']);

//Route::get('logout', 'UserController@logout');

