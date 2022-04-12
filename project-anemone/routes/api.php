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
use App\Http\Controllers\Auth\VerifyEmailController;

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
    Route::apiResource('anemone', 'ApiController');
});

/*Route::post('/register', function(Request $request){
  return RegisterController::register_user($request);
});*/

//Authorization
Route::post('/register', [RegisterController::class, 'register_user']);

Route::post('/login', [LoginController::class, 'sign_in']);

//protected
Route::group(['middleware' => ['auth:sanctum']], function () {
  Route::post('/logout', [LogoutController::class, 'log_out']);
  Route::post('/documents', [DocumentController::class, 'upload']);
});

// Verify email
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'confirmation'])
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

// Resend link to verify email
Route::post('/email/verify/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
