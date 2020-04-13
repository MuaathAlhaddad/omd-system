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


Route::namespace('Customers')->group(function (){
    // Route::resource('customers', 'ApiController');
    Route::get('customers', 'ApiController@index');
    Route::post('customers', 'ApiController@store');
    Route::get('customers/{customer}', 'ApiController@show');
    Route::put('customers/{customer}', 'ApiController@update');
    Route::delete('customers/{customer}', 'ApiController@destroy');
});

