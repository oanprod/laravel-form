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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/forms', 'FormsController@create');
Route::post('/forms', 'FormsController@display');

Route::get('/categories', 'CategoriesController@index');
Route::post('/categories', 'CategoriesController@store');
Route::get('/categories/create', 'CategoriesController@create');

Route::get('/products', 'ProductsController@index');
Route::post('/products', 'ProductsController@store');
Route::get('/products/create', 'ProductsController@create');