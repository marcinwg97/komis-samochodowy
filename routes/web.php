<?php

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/pdf/faktura/{id}','InvoiceController@createInvoice')->name('sprzedaz.faktura.pdf');

//route klienci
Route::resource('/klienci', 'ClientController', ['except' => ['show'], 'names' => [
    'index'   => 'klienci.index',
    'create'  => 'klienci.create',
    'store'   => 'klienci.store',
    'edit'    => 'klienci.edit',
    'update'  => 'klienci.update',
    'destroy' => 'klienci.destroy'
]], ['except' => ['show']])->middleware('auth');
Route::post('/klienci/szukaj', 'ClientController@showSearch')->name('klienci.search');

//route samochody
Route::resource('/samochody', 'CarController', ['except' => ['show'], 'names' => [
    'index'   => 'samochody.index',
    'create'  => 'samochody.create',
    'store'   => 'samochody.store',
    'edit'    => 'samochody.edit',
    'update'  => 'samochody.update',
    'destroy' => 'samochody.destroy'
]], ['except' => ['show']])->middleware('auth');

//route rezerwacje
Route::resource('/rezerwacje', 'ReservationController', ['except' => ['show'], 'names' => [
    'index'   => 'rezerwacje.index',
    'create'  => 'rezerwacje.create',
    'store'   => 'rezerwacje.store',
    'destroy' => 'rezerwacje.destroy'
]], ['except' => ['show']])->middleware('auth');


//route sprzedaz
Route::resource('/sprzedaz', 'CarSaleController', ['except' => ['show'], 'names' => [
    'index'   => 'sprzedaz.index',
    'create'  => 'sprzedaz.create',
    'store'   => 'sprzedaz.store'
]], ['except' => ['show']])->middleware('auth');