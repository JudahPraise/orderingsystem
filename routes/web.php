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
})->name('welcome');

Route::get('/products', 'ProductController@index')->name('product.index');
Route::post('/product/store', 'ProductController@store')->name('product.store');

Route::get('/menu', 'OrderController@index')->name('menu.index');
Route::post('/order', 'OrderController@store')->name('menu.order');
