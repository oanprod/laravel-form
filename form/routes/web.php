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

// Home
Route::get('/', function () {
    return view('welcome', ['current' => 'home']);
});

// Categories
Route::get('/category/create', 'CategoryController@create');
Route::get('/categories/{id?}', 'CategoryController@index');
Route::post('/categories', 'CategoryController@store');

// Families
Route::get('/family/create', 'FamilyController@create');
Route::get('/families/{id?}', 'FamilyController@index');
Route::post('/families', 'FamilyController@store');

// Colors
Route::get('/color/create', 'ColorController@create');
Route::get('/colors/{id?}', 'ColorController@index');
Route::post('/colors', 'ColorController@store');

// Products
Route::get('/product/create', 'ProductController@create');
Route::get('/products/{id?}', 'ProductController@index');
Route::post('/products', 'ProductController@store');
