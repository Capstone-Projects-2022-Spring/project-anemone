<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::group([
  'prefix' => 'v1',
  'as' => 'api.',
  'namespace' => 'Api\V1\Admin',
  'middleware' => ['auth:api']
], function () {
    Route::apiResource('projects', 'ProjectsApiController');
});

Route::post('/register', function(Request $request){
  return RegisterController::register_user($request);
});

Route::get('/login', function(Request $request){
  return LoginController::sign_in($request);
});

Route::get('/logout', function(){
  return LogoutController::log_out();
});

Route::get('/email/verify', function() {
    return view('auth.emailverify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/index');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/documents', function(Request $request){
  return DocumentController::upload($request);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
