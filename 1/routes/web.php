<?php

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
Route::get('/test-build', function(){
	return view('test-build');
});

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/

/*Route::get('/test-axios', 'HomeController@test');*/

/*Route::get('/conf', 'ConfiguratorController@index');*/

//Dashboard
Route::get('/admin', 'AdminController@index')->middleware('auth');
Route::get('/{catchall?}', function () {
    return response()->view('welcome');
})->where('catchall', '(.*)');

//
/*Route::get('/{product}', 'ProductController@index');
Route::get('/{product}/{model}', 'ProductController@getModel');*/

