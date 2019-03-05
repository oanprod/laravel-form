<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * List all categories
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        // used to choose elements display on view or not
        $all = true;

        // fetch all categories (array of Category object)
        $categories = Category::all();

        // current used to choose current element of menu
        return view('categories.index',  ['current' => 'categories', 'categories' => $categories, 'all' => $all]);
    }

    /**
     * Store a new category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store() {
        // create a new empty Category Object
        $category = new Category();

        $category->name = request('name');
        $category->description = request('description');

        // Save Category object
        $category->save();

        // Fetch all categories (array of Category object)
        $categories = Category::all();

        // current used to choose current element of menu
        return view('categories.index',  ['current' => 'categories', 'categories' => $categories]);
    }

    /**
     * Update a category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update() {
        // used to choose elements display on view or not
        $all = false;

        // find a Category object  referenced vy id parameter
        $category = Category::find(request()->route('id'));

        $category->name = request('name');
        $category->description = request('description');

        // save Category object
        $category->save();

        // get an array of Category object referenced by id parameter
        $categories = Category::where('id', request()->route('id'))->get();

        // current used to choose current element of menu
        return view('categories.index',  ['current' => 'categories', 'categories' => $categories, 'all' => $all]);
    }

    /**
     * Delete a category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete() {
        // used to choose elements display on view or not
        $all = true;

        // find a category object  referenced vy id parameter
        $category = Category::find(request()->route('id'));

        // delete Category object
        $category->delete();

        // Fetch all categories (array of Category object)
        $categories = Category::all();

        // current used to choose current element of menu
        return view('categories.index',  ['current' => 'categories', 'categories' => $categories, 'all' => $all]);
    }
}
