<?php

use Illuminate\Support\Facades\Route;
use App\Category;

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

/******** Home ******/

Route::get('/', function () {
    return view('welcome', ['current' => 'home']);
});

/******** Categories ******/

// Create form
Route::get('/category/create', function () {
    return view('categories.create', ['current' => 'categories']);
});

// Show only one category referenced by id parameter
Route::get('/category/{id}', function () {
    return view('categories.index', [
        'categories' => Category::where('id', request()->route('id'))->get(),
        'all' => false,
        'current' => 'categories'
    ]);
});

// Show all categories
Route::get('/categories', 'CategoryController@index');

// Store a new category
Route::post('/categories', 'CategoryController@store');

// Update form
Route::get('/category/{id}/update', function () {
    return view('categories.update', [
        'category' => Category::find(request()->route('id')),
        'current' => 'categories'
    ]);
});

// Update a category referenced by id parameter
Route::post('/category/{id}/update', 'CategoryController@update');

// Delete confirmation
Route::get('/category/{id}/delete', function () {
    return view('categories.delete', [
        'category' => Category::find(request()->route('id')),
        'current' => 'categories'
    ]);
});

// Delete a category referenced by id parameter
Route::post('/category/{id}/delete', 'CategoryController@delete');


/******** Families ******/

Route::get('/family/create', 'FamilyController@create');
Route::get('/family/{id?}', 'FamilyController@index');
Route::get('/families', 'FamilyController@index');
Route::post('/families', 'FamilyController@store');

/******** Colors ******/

Route::get('/color/create', 'ColorController@create');
Route::get('/color/{id?}', 'ColorController@index');
Route::get('/colors', 'ColorController@index');
Route::post('/colors', 'ColorController@store');

/******** Products ******/

Route::get('/product/create', 'ProductController@create');
Route::get('/product/{id?}', 'ProductController@index');
Route::get('/products', 'ProductController@index');
Route::post('/products', 'ProductController@store');
