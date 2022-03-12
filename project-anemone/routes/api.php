<?php

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

Route::group([
  'prefix' => 'v1',
  'as' => 'api.',
  'namespace' => 'Api\V1\Admin',
  'middleware' => ['auth:api']
], function () {
    Route::apiResource('projects', 'ProjectsApiController');
});

// user routes
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->post('/user', function(Request $request){
  return $request->create_user();
});

Route::middleware('auth:sanctum')->post('/user/[]', function(Request $request){
  return $request->create_user_array();
});

Route::middleware('auth:sanctum')->post('/user/logout', function(Request $request){
  return $request->logout();
});

Route::middleware('auth:sanctum')->get('/user/{username}', function(Request $request){
  return $request->get_username();
});

Route::middleware('auth:sanctum')->put('/user/{username}', function(Request $request){
  return $request->update_username_by_username();
});

Route::middleware('auth:sanctum')->delete('/user/{username}', function(Request $request){
  return $request->delete_user();
});

// document routes
Route::middleware('auth:sanctum')->post('/upload', function(Request $request){
  return $request->upload();
});

Route::middleware('auth:sanctum')->put('/document', function(Request $request){
  return $request->update_document();
});

Route::middleware('auth:sanctum')->get('/document/status', function(Request $request){
  return $request->find_document_by_status();
});

Route::middleware('auth:sanctum')->get('/document/{documentId}', function(Request $request){
  return $request->get_document_by_id();
});

Route::middleware('auth:sanctum')->delete('/document/{documentId}', function(Request $request){
  return $request->delete_document_by_id();
});

Route::middleware('auth:sanctum')->post('/document/[]', function(Request $request){
  return $request->create_document_list();
});

// search route
Route::middleware('auth:sanctum')->get('/document/search/{path}', function(Request $request){
  return $request->search_documents_by_query();
});