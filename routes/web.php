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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/item', 'AdminDashboard@index')->name('admin.items');
Route::get('/item/create', 'AdminDashboard@createitem')->name('item.create');
Route::post('/item/create', 'AdminDashboard@storeitem')->name('item.store');
Route::get('/item/edit/{item}', 'AdminDashboard@edititem')->name('item.edit');
Route::patch('/item/update/{item}', 'AdminDashboard@updateitem')->name('item.update');
Route::delete('/item/delete/{id}', 'AdminDashboard@deleteitem')->name('item.delete');

Route::get('/admin/giftcards', 'AdminDashboard@viewgc')->name('admin.giftcards');
Route::get('/giftcards/create', 'AdminDashboard@creategc')->name('giftcards.create');
Route::post('/giftcards/create', 'AdminDashboard@storegc')->name('giftcards.store');
Route::get('/giftcards/edit/{gc}', 'AdminDashboard@editgc')->name('giftcards.edit');
Route::patch('/giftcards/update/{gc}', 'AdminDashboard@updategc')->name('giftcards.update');
Route::delete('/giftcards/delete/{id}', 'AdminDashboard@deletegc')->name('giftcards.delete');

Route::get('/store/item', 'UserController@items')->name('store.items');
Route::get('/store/giftcard', 'UserController@giftcards')->name('store.giftcards');

Route::post('/store/giftcard/{giftcard}', 'UserController@purchasegc')->name('purchase.giftcard');
Route::post('/store/item/{item}', 'UserController@purchaseItem')->name('purchase.item');

Route::get('/mygiftcard', 'UserController@usergc')->name('users.giftcard');

