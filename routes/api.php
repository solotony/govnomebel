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

Route::group(['as'=>'api.', 'namespace' => 'Api'], function () {
    Route::get('products/sofa', 'Products\SofaController@index');
    Route::get('products/sofa/{slug}', 'Products\SofaController@show');

    Route::get('materials', 'MaterialController@index');

    Route::resource('products', 'Products\ProductController')->only('index', 'show');
    Route::resource('fabrics', 'Fabrics\FabricsController')->only('index', 'show');
    Route::resource('work', 'EstimateWorkController')->only('index', 'show');


    Route::post('order/take', 'OrderController@take');

    Route::post('user/register/order', 'UserController@order');
});
