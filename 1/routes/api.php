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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function(Request $request){
	$arrResponse = ['id' => 1, 'title' => 'Test Title123', 'content' => 'Test Content'];
	$response = json_encode($arrResponse);
	return $response;
});

Route::get('/getNewTitle', function(Request $request){
	$arrResponse = ['id' => 2, 'title' => 'New Test Title123', 'content' => 'New Test Content'];
	$response = json_encode($arrResponse);
	return $response;
});
