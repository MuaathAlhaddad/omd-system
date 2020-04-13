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
Route::get('/dashboard', function () {
    return view('layouts.vertical');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Invoices')->group(function (){
    Route::get('invoices/index', 'InvoiceController@index')->name('invoices.index');
    Route::post('invoices/show', 'InvoiceController@show')->name('invoices.show');
    Route::get('invoices/create', 'InvoiceController@create')->name('invoices.create');
    Route::get('invoices/store', 'InvoiceController@store')->name('invoices.store');
    Route::get('invoices/edit', 'InvoiceController@edit')->name('invoices.edit');
    Route::get('invoices/update', 'InvoiceController@update')->name('invoices.update');
    Route::post('invoices/{id}/delete', 'InvoiceController@destroy')->name('invoices.delete');
});


Route::namespace('Customers')->group(function (){
    Route::get('customers', 'CustomerController@index')->name('customers.index');
    Route::get('customers/{customer}', 'CustomerController@index')->name('customers.show');
    // Route::get('customers/create', 'CustomerController@create')->name('customers.create');
    // Route::post('customers/store', 'CustomerController@store')->name('customers.store');
    // Route::get('customers/{customer}/edit', 'CustomerController@edit')->name('customers.edit');
    // Route::patch('customers/{customer}', 'CustomerController@update')->name('customers.update');
});