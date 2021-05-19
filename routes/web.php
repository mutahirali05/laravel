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

// Route::get('/', function () {
//     return view('products_list');
// });

Route::group(['middleware' => 'IsAdmin'], function () {
   



Route::get('/', 'products@index');
Route::get('checkout', 'products@checkout')->name('checkout');
Route::get('add-product', 'products@create');
Route::get('edit-product,{id}', 'products@edit')->name('edit-product');
Route::post('store-product', 'products@store');
Route::post('update-product', 'products@update');
Route::get('delete-pro,{id}', 'products@destroy')->name('delete-pro');


Route::get('add-to-cart/{id}', 'CartController@addtocart')->name('add-to-cart');
Route::get('cart', 'CartController@index')->name('cart');
Route::get('delete-cart,{id}', 'CartController@delete')->name('delete-cart');
Route::post('update-quantity', 'CartController@UpdateQuantity')->name('update-quantity');


Route::post('order', 'OrderController@store')->name('order');
Route::get('order-list', 'OrderController@index')->name('order-list');
Route::get('view-order,{id}', 'OrderController@show')->name('view-order');
Route::get('delete-order,{id}', 'OrderController@destroy')->name('delete-order');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
