<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index')->name("main");
Route::get('/minor', 'HomeController@minor')->name("minor");
Route::get('/salesshow', 'HomeController@salesshow')->name("salesshow");

Route::resource('Suppliers', 'SupplierController');
Route::post('updatesupplier', 'SupplierController@update');
Route::resource('Clients', 'ClientController');
Route::post('updateClient', 'ClientController@update');

Route::resource('Items', 'ItemController');
Route::resource('Packages', 'PackageController');

Route::get('/show', 'ManufactureController@show');
Route::post('updateProduct', 'ManufactureController@update');

Route::post('updateItem', 'ItemController@update');
Route::post('updatePackage', 'PackageController@update');

Route::resource('Invoices', 'InvoiceController');
Route::resource('Sales', 'SaleController');
Route::post('createReturn', 'SaleController@createReturn');
// Route::post('print', 'SaleController@print');

Route::get('/print', 'SaleController@print')->name("print");

Route::resource('Purchases', 'PurchaseController');
Route::get('/revesesale', 'SaleController@revesesale')->name("revesesale");

Route::get('/payment', 'HomeController@payment');

// Route::get('/revesesale', 'HomeController@salesshow')->name("salesshow");

// Route::get('/', 'Auth\AuthController@login')->name('login');
// Route::post('login', 'Auth\AuthController@authenticate');
// Route::get('logout', 'Auth\AuthController@logout')->name('logout');

Route::post('updateinvoice', 'InvoiceController@update');
Route::post('updatesale', 'SaleController@update');

Route::post('createInvoice', 'InvoiceController@store');
Route::post('createSale', 'SaleController@store');

Route::post('createRefund', 'PurchaseController@store');
Route::post('createManufacture', 'ManufactureController@store');


Route::post('createUser', 'UserController@store');

Route::post('loaddata', 'HomeController@loaddata');



Route::resource('Users', 'UserController');
Route::resource('Manufactures', 'ManufactureController');

Route::post('updateUser', 'UserController@update');

///////////Payment

Route::get('/ReceiveCash', 'ExpenseController@ReceiveCash');
Route::get('/ReceiveCash/{id}', 'ExpenseController@ReceiveCash');

Route::get('/CashExchange', 'ExpenseController@CashExchange');
Route::get('/CashExchange/{id}', 'ExpenseController@CashExchange');

Route::get('/DefineExpenses', 'ExpenseController@DefineExpenses');
// Route::post('addexpense', 'ExpenseController');
Route::resource('addexpense', 'ExpenseController');
///////////
Route::post('updateReceiveCash', 'ExpenseController@updateReceiveCash');
Route::post('createReceiveCash', 'ExpenseController@addReceiveCash');

Route::post('updateCashExchange', 'ExpenseController@updateCashExchange');
Route::post('createCashExchange', 'ExpenseController@addCashExchange');

Route::post('ExpenseScreen', 'ExpenseController@ExpenseScreen');
Route::post('DefineExpenses', 'ExpenseController@DefineExpenses');

Route::post('destroypayment', 'ExpenseController@destroypayment');
Route::post('destroyexpese', 'ExpenseController@destroyexpese');

Route::get('/PaymentScreen', 'ExpenseController@PaymentScreen');
Route::get('/ExpenseScreen', 'ExpenseController@ExpenseScreen');

///////////

