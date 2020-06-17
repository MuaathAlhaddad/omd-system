<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('layouts.vertical');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::namespace('Invoices')->group(function (){
//     Route::get('invoices/index', 'InvoiceController@index')->name('invoices.index');
//     Route::get('invoices/show/{?id}', 'InvoiceController@show')->name('invoices.show');
//     Route::get('invoices/create', 'InvoiceController@create')->name('invoices.create');
// });
    Route::get('customers/{customer?}', 'HomeController@customers')->where('customer', '[0-9]+');
    Route::get('invoices/{invoice?}', 'HomeController@invoices')->where('invoice', '[0-9]+');
    Route::get('invoices/create', 'HomeController@invoices')->where('invoice', '[0-9]+');
    Route::get('items', 'HomeController@items');