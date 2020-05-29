<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('Customers')->group(function (){
    Route::resource('customers', 'ApiController');
});
Route::get('companyDetails', 'ApiController@getCompany_details');
Route::put('companyDetails', 'ApiController@updateCompany_details');
Route::get('currencies', 'ApiController@getCurrencies');

Route::namespace('Invoices')->group(function (){
    Route::resource('invoices', 'ApiController');
});

Route::namespace('Items')->group(function (){
    Route::resource('items', 'ApiController');
});