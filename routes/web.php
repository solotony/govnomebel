<?php

use Illuminate\Support\Facades\Route;

Route::get('cabinet/order', '\App\Http\Controllers\Cabinet\OrderController@index');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

/*Route::get('/', function () {
    return response()->view('welcome');
});*/

Route::get('/{catchall?}', function () {
    return response()->view('welcome');
})->where('catchall', '(.*)');


