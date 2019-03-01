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

// Categories
Route::get('/categories/{id}', 'CategoryController@index');
Route::get('/categories', 'CategoryController@index');
Route::post('/categories', 'CategoryController@store');
Route::get('/categories/create', 'CategoryController@create');

// Products
Route::get('/products/{id}', 'ProductController@index');
Route::get('/products', 'ProductController@index');
Route::post('/products', 'ProductController@store');
Route::get('/products/create', 'ProductController@create');

// Colors
Route::get('/colors', 'ColorController@index');
Route::post('/colors', 'ColorController@store');
Route::get('/colors/create', 'ColorController@create');

