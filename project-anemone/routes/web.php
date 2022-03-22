<?php

// use App\Http\Controllers\DocumentController;
// use App\Http\Controllers\AnnotationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
    return view('register');
});

Route::get('/index', [IndexController::class, 'index'])->name('index')->middleware('auth', 'verified');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register_user']);

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/index');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'sign_in']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth', 'verified');

Route::get('/logout', [LogoutController::class, 'log_out'])->name('logout');
Route::post('/logout', [LogoutController::class, 'log_out']);

Route::get('/', function () {
    return view('login');
});

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
